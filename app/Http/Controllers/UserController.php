<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Menampilkan data user yang sedang login.
     *
     * @return \Illuminate\View\View
     */
    public function viewProfile()
    {
        $user = Auth::user();
        return view('pages.users.my-profile', compact('user'));
    }

    /**
     * Menampilkan halaman edit data user yang sedang login.
     *
     * @return \Illuminate\View\View
     */
    public function editProfile()
    {
        $user = Auth::user();
        return view('user.edit', compact('user'));
    }

    /**
     * Memperbarui data user yang sedang login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateProfile(Request $request)
    {
        // Ambil ID pengguna dari sesi yang sedang login
        $userId = Auth::user()->id;
        $user   = User::findOrFail($userId);

        // Validasi input
        $request->validate([
            'name'          => 'required|string|max:255',
            'email'         => 'required|email|unique:users,email,' . $user->id,
            'gender'        => 'nullable|in:male,female',
            'address'       => 'nullable|string|max:255',
            'phone'         => 'nullable|string|max:20',
            'birth_date'    => 'nullable|date',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Jika ada file yang diupload, simpan foto profil
        if ($request->hasFile('profile_photo')) {
            // Hapus foto lama jika ada
            if ($user->profile_photo && file_exists(storage_path('app/public/' . $user->profile_photo))) {
                unlink(storage_path('app/public/' . $user->profile_photo));
            }

            // Upload foto baru
            $path                = $request->file('profile_photo')->store('profile_photos', 'public');
            $user->profile_photo = $path;
        }

        // Update data pengguna
        $user->update($request->only(['name', 'email', 'gender', 'address', 'phone', 'birth_date']));

        return redirect()->route('user.profile')->with('success', 'Profile updated successfully!');
    }
}
