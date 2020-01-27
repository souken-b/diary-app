<?php

namespace App\memo;

use Illuminate\Database\Eloquent\Model;

class Family_memo extends Model
{

    protected $fillable = [
        'family_id',
        'content',
    ];
}
