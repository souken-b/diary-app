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

        return view('family.index',compact('user'));

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
        

        return view('family.index',compact('user'));

    }

    public function edit($family_id){
        $family = Family::findOrFail($family_id);
        return view('family.edit',compact('family'));
    }

    public function update($family_id,Request $request){
        $params = $request->validate([
            'title'=>'required|max:50',
            'content'=>'required|max:2000',
        ]);

        $family = Family::findOrFail($family_id);
        $family->fill($params)->save();

        return view('family.show',compact('family'));
    }

    public function show($family_id){
        $family = Family::findOrFail($family_id);

        return view('family.show',compact('family'));
    }
    public function destroy($family_id){
        $family = Family::findOrFail($family_id);
        
        \DB::transaction(function()use($family){
            $family->family_memos()->delete();
            $family->delete();
        });
        $user = Auth::user();

        return view('family.index',compact('user'));
    }
    //
    //
}
