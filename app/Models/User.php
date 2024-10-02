<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Post;
use Auth;



class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'icon_image',
        'updated_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    public function post()//ポストとユーザーを紐付けるリレーション
    {
        return $this->hasMany('App\Models\Post');//一人のユーザーに対してポストは複数あるため
    }

    //ユーザー情報を返すため
    public function following_user()//フォローしているユーザーの取得
    {
        return $this->belongsToMany(User::class,'follows','following_id','followed_id');//使用するクラス、紐付けたいテーブル、フォローする方のID、フォローされる方のID
    }

    public function followed_user()//フォローされているユーザーの取得
    {
        return $this->belongsToMany(User::class,'follows','followed_id','following_id');//使用するクラス、紐付けたいテーブル、フォローされる方のID、フォローする方のID
    }
    //ログインユーザー(Auth::user())との関係性を返す
    //0:どちらもフォローしていない　1：ログインユーザーが相手をフォロー　2：相手がログインユーザーをフォロー　3：お互いにフォロー
    public function relation()
    {
        $id = $this->id;
    
        //ログインユーザーが対象ユーザーをフォローしているか？をtrue/falseで返す
        $follow = (boolean) Auth::user()->following_user()->where('followed_id', $id)->first();
    
        //対象Userが自分をフォローしているか？をtrue/falseで返す
        $follower = (boolean) $this->following_user()->where('followed_id', Auth::user()->id)->first();
    
        if(!($follow) && !($follower)){ //0:どちらもフォローしていない
            $result = 0;
        }elseif($follow && !($follower)){ //1：ログインユーザーが相手をフォロー
            $result = 1;
        }elseif(!($follow) && $follower){ //2：相手がログインユーザーをフォロー
            $result = 2;
        }else{ //3：お互いにフォロー
            $result = 3;
        }
    
        return $result;
    }

    //ログインユーザーは、対象ユーザーをフォローしているか？
    public function isFollowing()
    {
        $id = $this->id;
        $isFollowing = (boolean) Auth::user()->following_user()->where('followed_id',$id)->first();

        return $isFollowing;
    }

}
