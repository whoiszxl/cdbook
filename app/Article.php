<?php

namespace App;

use App\Model;

class Article extends Model
{
    //关联用户
    public function user(){
        
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
