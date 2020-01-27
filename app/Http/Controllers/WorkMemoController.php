<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Work;


class WorkMemoController extends Controller
{

   
    public function store(Request $request){

        $params = $request->validate([
            'work_id' => 'required|exists:works,id',
            
            'content' => 'required|max:2000',
        ]);
        $work = Work::findOrFail($params['work_id']);

        $work->work_memos()->create($params);
        

        return view('work.show',compact('work'));

    }

    
    //
}
