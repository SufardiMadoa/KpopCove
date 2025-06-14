<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Users::all();
        return view('pages.admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.users.create');
    }

    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_222305'    => 'required|string|max:255',
            'email_222305'   => 'required|string|email|max:255|unique:users_222305,email_222305',
            'password'       => 'required|string|min:8|confirmed',
            'no_telp_222305' => 'required|string|max:15',
            'role_222305'    => 'required|in:admin,user',
        ]);

        $user = Users::create([
            'nama_222305'     => $request->nama_222305,
            'email_222305'    => $request->email_222305,
            'password_222305' => Hash::make($request->password),
            'no_telp_222305'  => $request->no_telp_222305,
            'role_222305'     => $request->role_222305,
        ]);

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User berhasil dibuat!');
    }

    /**
     * Display the specified user.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Users::with(['albums', 'keranjang', 'pemesanan'])->findOrFail($id);
        return view('pages.admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Users::findOrFail($id);
        return view('pages.admin.users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = Users::findOrFail($id);

        $rules = [
            'nama_222305'    => 'required|string|max:255',
            'email_222305'   => 'required|string|email|max:255|unique:users_222305,email_222305,' . $id . ',email_222305',
            'no_telp_222305' => 'required|string|max:15',
            'role_222305'    => 'required|in:admin,user',
        ];

        // Only validate password if it's provided
        if ($request->filled('password')) {
            $rules['password'] = 'required|string|min:8|confirmed';
        }

        $request->validate($rules);

        // Update user data
        $user->nama_222305    = $request->nama_222305;
        $user->email_222305   = $request->email_222305;
        $user->no_telp_222305 = $request->no_telp_222305;
        $user->role_222305    = $request->role_222305;

        // Update password if provided
        if ($request->filled('password')) {
            $user->password_222305 = Hash::make($request->password);
        }

        $user->save();

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User berhasil diperbarui!');
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Users::findOrFail($id);

        // Delete associated albums, keranjang, and pemesanan if needed
        // (You may want to customize this based on your business logic)

        $user->delete();

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User berhasil dihapus!');
    }
}
