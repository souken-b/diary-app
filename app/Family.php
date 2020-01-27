<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    public function family_memos(){
        return $this->hasMany('App\memo\Family_memo');
    }
    protected $fillable = [
        'title',
        'content',
        'family_id',
    ];
  
 
}
