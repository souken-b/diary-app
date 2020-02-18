<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Family;
use App\User;
class FamilyController extends Controller
{
    public function index(){
        $user = Auth::user();
        $items = $user->families()->orderBy('created_at','desc')->paginate(5);

        return view('family.index',compact('items'));

    }

    public function create(){
        $user = Auth::user();
        return view('family.create',compact('user'));
    }

    public function store(Request $request){

        $params = $request->validate([
            'user_id' => 'required|exists:users,id',
            'title' =>'required|max:50',
            'content' => 'required|max:2000',
        ]);
        $user = User::findOrFail($params['user_id']);

        $user->families()->create($params);
        
        $items = $user->families()->orderBy('created_at','desc')->paginate(5);

        return view('family.index',compact('items'));

    }

    public function edit($item){
        $family = Family::findOrFail($item);
        return view('family.edit',compact('family'));
    }

    public function update($item,Request $request){
        $params = $request->validate([
            'title'=>'required|max:50',
            'content'=>'required|max:2000',
        ]);

        $family = Family::findOrFail($item);
        $family->fill($params)->save();

        return view('family.show',compact('family'));
    }

    public function show($item){
        $family = Family::findOrFail($item);

        return view('family.show',compact('family'));
    }
    public function destroy($item){
        $family = Family::findOrFail($item);
        
        \DB::transaction(function()use($family){
            $family->family_memos()->delete();
            $family->delete();
        });
        $user = Auth::user();

        $items = $user->families()->orderBy('created_at','desc')->paginate(5);

        return view('family.index',compact('items'));
    }
    //
    //
}
