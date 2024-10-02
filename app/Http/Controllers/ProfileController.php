<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;

class ProfileController extends Controller
{
    public function profile(){
        return view('profiles.profile');
    }

    public function profile_edit(Request $request){

        $user = auth()->user();

        $image = $request->file('icon');
        $path = $image->store('public/image');
        $path = str_replace('public/', '', $path); // パスの修正
        $user->icon_image = $path; // アイコンのパスをデータベースに保存

        $user->update([
            'username' => $request->username,
            'email' => $request->email,
            // 'password' => Hash::make($request->password),
            'bio' => $request->bio,

        ]);
        return redirect('/profile');
    }
    
}
