<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Cooking;
use App\User;
class CookingController extends Controller
{
    public function index(){
        $user = Auth::user();

        return view('cooking.index',compact('user'));

    }

    public function create(){
        $user = Auth::user();
        return view('cooking.create',compact('user'));
    }

    public function store(Request $request){

        $params = $request->validate([
            'user_id' => 'required|exists:users,id',
            'title' =>'required|max:50',
            'content' => 'required|max:2000',
        ]);
        $user = User::findOrFail($params['user_id']);

        $user->cooks()->create($params);
        

        return view('cooking.index',compact('user'));

    }

    public function edit($cooking_id){
        $cooking = Cooking::findOrFail($cooking_id);
        return view('cooking.edit',compact('cooking'));
    }

    public function update($cooking_id,Request $request){
        $params = $request->validate([
            'title'=>'required|max:50',
            'content'=>'required|max:2000',
        ]);

        $cooking = Cooking::findOrFail($cooking_id);
        $cooking->fill($params)->save();

        return view('cooking.show',compact('cooking'));
    }

    public function show($cooking_id){
        $cooking = Cooking::findOrFail($cooking_id);

        return view('cooking.show',compact('cooking'));
    }
    public function destroy($cooking_id){
        $cooking = Cooking::findOrFail($cooking_id);
        
        \DB::transaction(function()use($cooking){
            $cooking->cooking_memos()->delete();
            $cooking->delete();
        });
        $user = Auth::user();

        return view('cooking.index',compact('user'));
    }
    //
}
