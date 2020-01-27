<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Family;

class FamilyMemoController extends Controller
{
    public function store(Request $request){

        $params = $request->validate([
            'family_id' => 'required|exists:families,id',
            
            'content' => 'required|max:2000',
        ]);
        $family = Family::findOrFail($params['family_id']);

        $family->family_memos()->create($params);
        

        return view('family.show',compact('family'));

    }
    //
}
