<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Follow;
use Auth;

class UsersController extends Controller
{
    //
    public function search(Request $request)
    {
        $keyword = $request->input('search');

        if(!empty($keyword))
        {
            $users = User::where('username', 'like', '%' . $keyword . '%')->
                           where('id','!=',auth()->user()->id)->get();
            $message = "「" . $keyword . "」を含む名前が" . $users->count() . "件ヒットしました。";
        }
        else
        {
            $users = User::all()->except([\Auth::id()]);
            $message = "検索キーワードが入力されていません。全ユーザーを表示します。";
        }
        return view('users.search', compact('users', 'message', 'keyword'));
    }

    
    public function follow(Request $request)
    {
        $follow_id = $request->follow_id;
        
        //ログインユーザーが対象のユーザーをフォローしているか？ 
        $isFollow = (boolean) Follow::where('following_id', Auth::user()->id)->where('followed_id', $follow_id)->first();

        if($isFollow){
            $unfollow = Follow::where('following_id', Auth::user()->id)->where('followed_id', $follow_id);
            $unfollow->delete();
        }else{
            $follow = new follow();
            $follow->following_id = Auth::user()->id;
            $follow->followed_id = $follow_id;
            $follow->save();
        }

        return back();
    }
}