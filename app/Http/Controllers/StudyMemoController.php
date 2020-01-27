<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Study;

class StudyMemoController extends Controller
{
    public function store(Request $request){

        $params = $request->validate([
            'study_id' => 'required|exists:studies,id',
            
            'content' => 'required|max:2000',
        ]);
        $study = Study::findOrFail($params['study_id']);

        $study->study_memos()->create($params);
        

        return view('study.show',compact('study'));

    }
    //
}
