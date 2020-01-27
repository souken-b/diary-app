<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    public function sport_memos(){
        return $this->hasMany('App\memo\Sport_memo');
    }
    protected $fillable = [
        'title',
        'content',
        'sport_id',
    ];
  
  
    //
}
