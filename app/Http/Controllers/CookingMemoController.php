<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cooking;

class CookingMemoController extends Controller
{
    public function store(Request $request){

        $params = $request->validate([
            'cooking_id' => 'required|exists:cookings,id',
            
            'content' => 'required|max:2000',
        ]);
        $cooking = Cooking::findOrFail($params['cooking_id']);

        $cooking->cooking_memos()->create($params);
        

        return view('cooking.show',compact('cooking'));

    }
    //
}
