<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
{
    use HasFactory;

    public function user()//ポストとユーザーを紐付けるリレーション
    {
        return $this->belongsTo('App\Models\User');//ポストに対してユーザーは一人しかいないため
    }
}
