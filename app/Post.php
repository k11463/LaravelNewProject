<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'content', 'updated_at'];

    public function user() //一篇文章屬於一個使用者
    {
        return $this->belongsTo('App\User');
    }

    public function category() //一篇文章屬於一個Category Category=分類
    {
        return $this->belongsTo('App\Category');
    }
}
