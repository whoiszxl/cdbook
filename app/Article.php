<?php

namespace App;

use App\Model;

class Article extends Model
{
    //关联用户
    public function user(){
        
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    //关联评论
    public function comments(){
        
        return $this->hasMany('\App\Comment', 'article_id', 'id')->orderBy('created_at', 'desc');
    }
}
