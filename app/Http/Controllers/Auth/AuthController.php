<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //

    public function Register(Request $request) {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'role' => 'nullable|in:siswa,petugas',
            'nis' => 'required',
            'kelas' => 'required'
        ]);

        $data['password'] = bcrypt($data['password']);
        $data['role'] = 'siswa' ;


        $user = User::create($data);

        return response()->json([
            'data created',
            'data' => $data,
            'token' => $user->createToken('auth')->plainTextToken
        ]);

    }
    public function Login(Request $request) {
        $credentials = $request->only('email', 'password');

    if (!Auth::attempt($credentials)) {
        return response()->json(['message' => 'Login gagal'], 401);
    }

    $user = Auth::user();
    $token = $user->createToken('auth_token')->plainTextToken;

    return response()->json(['message' => 'Login berhasil', 'token' => $token, 'user' => $user]);


    }

    public function logout(Request $request) {
         $request->user()->currentAccessToken()->delete();
         return response()->json(['message' => 'Logout berhasil']);
    }
}
