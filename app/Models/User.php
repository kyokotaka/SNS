<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Post;


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
    public function following_user()//フォローしているユーザーのリレーション
    {
        return $this->belongsToMany(User::class,'follows','following_id','followed_id');//使用するクラス、紐付けたいテーブル、フォローする方のID、フォローされる方のID
    }

    public function followed_user()//フォローされているユーザーのリレーション
    {
        return $this->belongsToMany(User::class,'follows','followed_id','following_id');//使用するクラス、紐付けたいテーブル、フォローされる方のID、フォローする方のID
    }


}
