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

        $items = $user->cooks()->orderBy('created_at','desc')->paginate(5);

        return view('cooking.index',compact('items'));

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

        $items = $user->cooks()->orderBy('created_at','desc')->paginate(5);
        
        return view('cooking.index',compact('items'));

    }

    public function edit($item){
        $cooking = Cooking::findOrFail($item);
        return view('cooking.edit',compact('cooking'));
    }

    public function update($item,Request $request){
        $params = $request->validate([
            'title'=>'required|max:50',
            'content'=>'required|max:2000',
        ]);

        $cooking = Cooking::findOrFail($item);
        $cooking->fill($params)->save();

        return view('cooking.show',compact('cooking'));
    }

    public function show($item){
        $cooking = Cooking::findOrFail($item);

        return view('cooking.show',compact('cooking'));
    }
    public function destroy($item){
        $cooking = Cooking::findOrFail($item);
        
        \DB::transaction(function()use($cooking){
            $cooking->cooking_memos()->delete();
            $cooking->delete();
        });
        $user = Auth::user();

        $items = $user->cooks()->orderBy('created_at','desc')->paginate(5);

        return view('cooking.index',compact('items'));
    }
    //
}
