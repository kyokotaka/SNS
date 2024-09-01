<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function register_form(): View//このメソッドは絶対Viewで返すと宣言している
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function user_create(Request $request): RedirectResponse
    {
        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),//bcrypt($request->password);でも可
        ]);
        // $user = new User();新しいインスタンスを作る
        // $user->username = $request->username;
        // $user->email = $request->email;
        // $user->password = Hash::make($request->password);
        // $user->save();こちらでも可
        $request->session()->put('username', $request->username);
        $username = $request->username;
        return redirect()->route('added');
    }

    public function added(): View
    {
        return view('auth.added');
    }
}
