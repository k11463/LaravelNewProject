<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'content', 'category_id'];

    public function user() //一篇文章屬於一個使用者
    {
        return $this->belongsTo('App\User');
    }

    public function category() //一篇文章屬於一個Category Category=分類
    {
        return $this->belongsTo('App\Category');
    }

    public function tags() //一篇文章可能有多個標籤
    {
        return $this->belongsToMany('App\Tag');
    }

    public function tagsString()
    {
        $tagsName = [];
        foreach($this->tags as $key => $tag) {
            $tagsName[] = $tag->name;
        }
        $tagsString = implode(',', $tagsName);

        return $tagsString;
    }
}
