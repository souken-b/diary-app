<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\memo;

class Study extends Model
{
    public function study_memos(){
        return $this->hasMany('App\memo\Study_memo');
    }

    protected $fillable = [
        'title',
        'content',
        'user_id',
    ];
  
  
    
    //
}
