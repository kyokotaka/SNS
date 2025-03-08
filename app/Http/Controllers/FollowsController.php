<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Auth;

class FollowsController extends Controller
{
    //
    public function followList(){
        $following = Auth::user();
        $follow_users = $following->following_user()->get();
        $follow_userPosts = Auth::user()->following_userPosts()->get();
        return view('follows.followList',compact('follow_users','follow_userPosts'));
    }
    public function followerList(){
        return view('follows.followerList');
    }
}
