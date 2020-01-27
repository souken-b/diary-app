<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\memo;

class Work extends Model
{
    public function work_memos(){
        return $this->hasMany('App\memo\Work_memo');
    }

    protected $fillable = [
        'user_id',
        'title',
        'content',
    ];
  
    //
}
