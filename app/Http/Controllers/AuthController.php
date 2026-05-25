<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ThinkingRole;
use App\Support\DefaultThinkingRoles;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended('/cognitive-hat');
        }

        return back()
            ->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])
            ->onlyInput('email');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
        ]);

        foreach (DefaultThinkingRoles::cognitiveHat() as $role) {
            ThinkingRole::create([
                'user_id' => $user->id,
                'model_key' => 'cognitive_hat',
                'code' => $role['code'],
                'name' => $role['name'],
                'title' => $role['title'],
                'profile_prompt' => $role['profile_prompt'],
                'is_active' => true,
                'sort_order' => $role['sort_order'],
            ]);
        }

        Auth::login($user);

        $request->session()->regenerate();

        return redirect('/cognitive-hat');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}