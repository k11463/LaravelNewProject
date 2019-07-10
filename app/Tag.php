<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function posts() //一個標籤可能有多個文章
    {
        return $this->belongsToMany('App\Post');
    }
}
