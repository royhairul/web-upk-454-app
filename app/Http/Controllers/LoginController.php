<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request):View
    {
        return view("login");
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($validatedData))
        {
            $request->session()->regenerate();

            return redirect()->intended(route('admin.laporan'));
        }

        return back()->withErrors([
            'username' => 'Username yang anda input tidak ada.',
        ])->onlyInput('username');
    }
}
