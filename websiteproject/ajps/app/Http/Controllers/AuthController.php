<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        // Plain password match (no bcrypt)
        if ($user && $user->password === $request->password) {
            // Store session manually
            session([
                'user_id' => $user->id,
                'user_name' => $user->name,
                'user_email' => $user->email
            ]);

            return redirect('/dashboard');
        }

        return back()->with('error', 'Invalid email or password.');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/login')->with('error', 'You have been logged out.');
    }
}
