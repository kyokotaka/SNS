<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
}
