<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    public function posts() //一個Category可能會有很多篇文章
    {
        return $this->hasMany('App\Post');
    }
}
