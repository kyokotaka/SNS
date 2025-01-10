<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class FollowsController extends Controller
{
    //
    public function followList(){
        $following = Auth::user();
        $follow_user = $following->following_user()->get();
        // $follow_icon = $follow_user->icon_image();
        return view('follows.followList',compact('follow_user'));
    }
    public function followerList(){
        return view('follows.followerList');
    }
}
