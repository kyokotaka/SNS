<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function login_form(): View//このメソッドは絶対Viewで返すと宣言している
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse//LoginRequestはRequestの拡張クラス
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended('/top');
    }

    public function logout(Request $request)
    {
        //Authからログアウトしますよというメソッドを使いログアウト
        Auth::logout();
        //$requestの中には現在ログインしているユーザーの情報が入っている。これらのセッション（データの塊）をインバリデート（無効）にしている。
        $request->session()->invalidate();
        return redirect("/login");
    }
}
