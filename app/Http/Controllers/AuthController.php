<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
  /**
   * Show the login form.
   *
   * @return \Illuminate\Http\Response
   */
  public function showLoginForm()
  {
    return view('pages.auth.login');
  }

  /**
   * Handle the login request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function login(Request $request)
  {
    // Validasi input
    $credentials = $request->validate(
      [
        'email'    => ['required', 'email'],
        'password' => 'required|min:8|max:15',
      ],
      [
        'email.required'    => 'Email wajib diisi.',
        'email.email'       => 'Masukkan email yang valid.',
        'password.required' => 'Password wajib diisi.',
        'password.min'      => 'Password harus memiliki minimal 8 karakter.',
        'password.max'      => 'Password tidak boleh lebih dari 15 karakter.',
      ]
    );

    // Menambahkan log percobaan login
    Log::info('Attempting login for:', $credentials);  // Menyimpan log

    // Attempt login menggunakan kolom yang sudah disesuaikan
    if (Auth::attempt([
      'email_222305' => $credentials['email'],
      'password'     => $credentials['password']
    ])) {
      // Regenerasi session ID untuk keamanan
      $request->session()->regenerate();

      // Menyimpan data tambahan ke session, termasuk role
      session([
        'user_id'   => Auth::user()->id_user_222305,
        'user_role' => Auth::user()->role_222305,  // Role user, misalnya 'admin' atau 'user'
        'email'     => Auth::user()->email,  // Role user, misalnya 'admin' atau 'user'
        'name'      => Auth::user()->nama_222305,
      ]);

      // Redirect berdasarkan peran pengguna
      if (Auth::user()->role === 'admin') {
        return redirect()->intended(route('admin.album,index'))->with('success', 'Login berhasil!');
      } else {
        return redirect()->intended('/admin')->with('success', 'Login berhasil!');
      }
    }

    Log::info('Session data after login attempt:', $request->session()->all());

    return back()->withErrors([
      'email' => 'Password dan email anda salah',
    ]);
  }

  /**
   * Show the registration form.
   *
   * @return \Illuminate\Http\Response
   */
  public function showRegisterForm()
  {
    return view('pages.auth.register');
  }

  /**
   * Handle the registration request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function register(Request $request)
  {
    $request->validate([
      'nama_222305'    => 'required|string|max:255',
      'email_222305'   => 'required|string|email|max:255|unique:users_222305,email_222305',
      'password'       => 'required|string|min:8|confirmed',
      'no_telp_222305' => 'required|string|max:15',
    ]);

    // Begin transaction
    DB::beginTransaction();

    try {
      // Create user
      $userId = Str::uuid()->toString();
      $user   = Users::create([
        'id_user_222305'  => $userId,
        'nama_222305'     => $request->nama_222305,
        'email_222305'    => $request->email_222305,
        'password_222305' => Hash::make($request->password),
        'no_telp_222305'  => $request->no_telp_222305,
        'role_222305'     => 'user',  // Default role for new registrations
      ]);

      // Create empty shopping cart for the user
      Keranjang::create([
        'id_keranjang_222305' => Str::uuid()->toString(),
        'id_user_222305'      => $userId,
        'total_harga_222305'  => 0,
      ]);

      DB::commit();

      // Login the user after registration
      Auth::login($user);

      return redirect()
        ->route('home')
        ->with('success', 'Pendaftaran berhasil! Selamat datang di aplikasi kami.');
    } catch (\Exception $e) {
      DB::rollback();
      return back()
        ->withErrors(['error' => 'Terjadi kesalahan saat mendaftar. Silakan coba lagi.'])
        ->withInput();
    }
  }

  /**
   * Log the user out of the application.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function logout(Request $request)
  {
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()
      ->route('login')
      ->with('success', 'Anda telah berhasil keluar dari aplikasi.');
  }

  /**
   * Show user profile page.
   *
   * @return \Illuminate\Http\Response
   */
  public function profile()
  {
    $user = Auth::user();
    return view('auth.profile', compact('user'));
  }

  /**
   * Update user profile.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function updateProfile(Request $request)
  {
    $user = Auth::user();

    $request->validate([
      'nama_222305'    => 'required|string|max:255',
      'email_222305'   => 'required|string|email|max:255|unique:users_222305,email_222305,' . $user->id_user_222305 . ',id_user_222305',
      'no_telp_222305' => 'required|string|max:15',
    ]);

    // Update user data
    $user->nama_222305    = $request->nama_222305;
    $user->email_222305   = $request->email_222305;
    $user->no_telp_222305 = $request->no_telp_222305;
    $user->save();

    return redirect()
      ->route('profile')
      ->with('success', 'Profil berhasil diperbarui!');
  }

  /**
   * Show change password form.
   *
   * @return \Illuminate\Http\Response
   */
  public function showChangePasswordForm()
  {
    return view('auth.change-password');
  }

  /**
   * Change user password.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function changePassword(Request $request)
  {
    $request->validate([
      'current_password' => 'required',
      'password'         => 'required|string|min:8|confirmed',
    ]);

    $user = Auth::user();

    // Check current password
    if (!Hash::check($request->current_password, $user->password_222305)) {
      return back()->withErrors(['current_password' => 'Password saat ini tidak sesuai']);
    }

    // Update password
    $user->password_222305 = Hash::make($request->password);
    $user->save();

    return redirect()
      ->route('profile')
      ->with('success', 'Password berhasil diubah!');
  }
}
