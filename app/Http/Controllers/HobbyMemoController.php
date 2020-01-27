<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hobby;

class HobbyMemoController extends Controller
{
    public function store(Request $request){

        $params = $request->validate([
            'hobby_id' => 'required|exists:hobbies,id',
            
            'content' => 'required|max:2000',
        ]);
        $hobby = Hobby::findOrFail($params['hobby_id']);

        $hobby->hobby_memos()->create($params);
        

        return view('hobby.show',compact('hobby'));

    }
    //
}
