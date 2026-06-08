<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Show the login form.
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Handle authentication attempt.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'login' => ['required', 'string'], // Username or Email
            'password' => ['required', 'string'],
        ]);

        // Determine if input is email or username
        $fieldType = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $authData = [
            $fieldType => $request->login,
            'password' => $request->password,
        ];

        // Check if user is suspended
        $user = User::where($fieldType, $request->login)->first();
        if ($user && $user->status === 'suspended') {
            throw ValidationException::withMessages([
                'login' => 'Akun Anda telah dinonaktifkan (suspended). Hubungi admin.',
            ]);
        }

        if (Auth::attempt($authData, $request->boolean('remember'))) {
            $request->session()->regenerate();

            // Redirect based on role
            $user = Auth::user();
            if ($user->isAdmin()) {
                return redirect()->intended('/dashboard/admin')->with('success', 'Selamat datang kembali, Admin!');
            }
            if ($user->isPetugas()) {
                return redirect()->intended('/dashboard/petugas')->with('success', 'Selamat datang kembali, Petugas!');
            }
            return redirect()->intended('/dashboard/user')->with('success', 'Selamat datang kembali!');
        }

        throw ValidationException::withMessages([
            'login' => 'Kredensial yang diberikan tidak cocok dengan data kami.',
        ]);
    }

    /**
     * Show the registration form.
     */
    public function showRegister()
    {
        return view('auth.register');
    }

    /**
     * Handle registration request.
     */
    public function register(Request $request)
    {
        $request->validate([
            'nik' => ['required', 'string', 'size:16', 'unique:users,nik'],
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'min:3', 'max:255', 'unique:users,username', 'alpha_num'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'telp' => ['required', 'string', 'max:15'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'nik.required' => 'NIK wajib diisi.',
            'nik.size' => 'NIK harus berukuran 16 karakter.',
            'nik.unique' => 'NIK sudah terdaftar.',
            'username.unique' => 'Username sudah digunakan.',
            'username.alpha_num' => 'Username hanya boleh berisi huruf dan angka.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        $user = User::create([
            'nik' => $request->nik,
            'name' => $request->name,
            'username' => strtolower($request->username),
            'email' => $request->email,
            'telp' => $request->telp,
            'password' => Hash::make($request->password),
            'role' => 'masyarakat',
            'status' => 'active',
        ]);

        Auth::login($user);

        return redirect('/dashboard/user')->with('success', 'Pendaftaran berhasil! Selamat datang di dashboard Anda.');
    }

    /**
     * Log the user out of the application.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('info', 'Anda telah berhasil keluar dari sistem.');
    }
}
