<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('admin.screens.auth.login');
    }

    public function doLogin(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'password' => 'required'
        ]);

        $auth = Auth::guard('admin')->attempt($request->only(['login', 'password']), $request->rememberMe ?: false);

        if ($auth) {
            $sessionUrl = session()->get('url');
            return redirect($sessionUrl ?: route('admin.dashboard'));
        } else {
            return redirect()->back()->withErrors(['message' => 'Login failed! Username or password is not correct.']);
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect(route('admin.login'))->with('success', 'Success! You\'ve logged out.');
    }
}
