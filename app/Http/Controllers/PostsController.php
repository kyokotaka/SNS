<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Auth;

class PostsController extends Controller
{
    //
    public function index()
    {
        $users = auth()->user();

        return view('posts.index',compact('users'));
    }

    public function post_create(Request $request)
    {
        $user = Auth::user();
        //投稿のインスタンス作成
        $new_post = new Post();
        $new_post->post = $request->post;
        $new_post->user_id = $user->id;
        $new_post->save();

        return redirect('/top');
    }

    public function post_update(Request $request)
    {

    }

    public function post_delete()
    {

    }
}
