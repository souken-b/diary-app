<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hobby extends Model
{
    
    public function hobby_memos(){
        return $this->hasMany('App\memo\Hobby_memo');
    }
    protected $fillable = [
        'title',
        'content',
        'hobby_id',
    ];
    
  
    //
}
