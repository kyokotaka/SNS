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
        $posts = Post::all();
        //dd($posts);
        // ->whereIn('user_id',Auth::user()->isFollowing()->pluck('followed_id'))->toArray();
        return view('posts.index',compact('posts'));
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

    public function post_delete($id)
    {
        Post::where('id',$id)->delete();
        return redirect(url('/top'))->with('message', 'ユーザーが削除されました');

    }
}
