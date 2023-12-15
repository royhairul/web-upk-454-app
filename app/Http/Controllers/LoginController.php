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

        $inputValue = $request->all();
        $request->validate([
            'pjmk_nim' => 'required',
            'pjmk_password' => 'required',
        ]);

        if (Auth::guard('pjmk')->attempt([
            'pjmk_nim' => $inputValue['pjmk_nim'],
            'pjmk_password' => $inputValue['pjmk_password']
        ]))
        {
            $request->session()->regenerate();

            return redirect()->intended(route('admin.laporan'));
        }

        return back()->withErrors([
            'pjmk_nim' => 'Username yang anda input tidak ada.',
        ])->onlyInput('pjmk_nim');
    }
}
