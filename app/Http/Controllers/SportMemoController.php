<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sport;

class SportMemoController extends Controller
{
    public function store(Request $request){

        $params = $request->validate([
            'sport_id' => 'required|exists:sports,id',
            
            'content' => 'required|max:2000',
        ]);
        $sport = Sport::findOrFail($params['sport_id']);

        $sport->sport_memos()->create($params);
        

        return view('sport.show',compact('sport'));

    }
    //
}
