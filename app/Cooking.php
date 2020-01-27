<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cooking extends Model
{
    public function cooking_memos(){
        return $this->hasMany('App\memo\Cooking_memo');
    }
    protected $fillable = [
        'title',
        'content',
        'cooking_id',
    ];
  
   
}
