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

    //關聯讚
    public function zan($user_id){
        
        return $this->hasOne(\App\Zan::class)->where('user_id', $user_id);
    }

    //文章的所有讚
    public function zans(){
        return $this->hasMany(\App\Zan::class);
    }
}
