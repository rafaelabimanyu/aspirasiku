<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\RegisterRequest;

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
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $authData = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        // Check if user is suspended
        $user = User::where('username', $request->username)->first();
        if ($user && $user->status === 'suspended') {
            throw ValidationException::withMessages([
                'username' => __('messages.account_suspended'),
            ]);
        }

        if (Auth::attempt($authData, $request->boolean('remember'))) {
            $request->session()->regenerate();

            // Redirect based on role
            $user = Auth::user();
            if ($user->isAdmin()) {
                return redirect()->intended('/dashboard/admin')->with('success', __('messages.login_success_admin'));
            }
            if ($user->isPetugas()) {
                return redirect()->intended('/dashboard/petugas')->with('success', __('messages.login_success_petugas'));
            }
            return redirect()->intended('/dashboard/user')->with('success', __('messages.login_success_user'));
        }

        throw ValidationException::withMessages([
            'username' => __('messages.login_failed'),
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
    public function register(RegisterRequest $request)
    {
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

        return redirect('/dashboard/user')->with('success', __('messages.register_success'));
    }

    /**
     * Log the user out of the application.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('info', __('messages.logout_success'));
    }
}
