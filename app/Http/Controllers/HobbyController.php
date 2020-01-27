<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Hobby;
use App\User;
class HobbyController extends Controller
{
    public function index(){
        $user = Auth::user();

        return view('hobby.index',compact('user'));

    }

    public function create(){
        $user = Auth::user();
        return view('hobby.create',compact('user'));
    }

    public function store(Request $request){

        $params = $request->validate([
            'user_id' => 'required|exists:users,id',
            'title' =>'required|max:50',
            'content' => 'required|max:2000',
        ]);
        $user = User::findOrFail($params['user_id']);

        $user->hobbies()->create($params);
        

        return view('hobby.index',compact('user'));

    }

    public function edit($hobby_id){
        $hobby = Hobby::findOrFail($hobby_id);
        return view('hobby.edit',compact('hobby'));
    }

    public function update($hobby_id,Request $request){
        $params = $request->validate([
            'title'=>'required|max:50',
            'content'=>'required|max:2000',
        ]);

        $hobby = Hobby::findOrFail($hobby_id);
        $hobby->fill($params)->save();

        return view('hobby.show',compact('hobby'));
    }

    public function show($hobby_id){
        $hobby = Hobby::findOrFail($hobby_id);

        return view('hobby.show',compact('hobby'));
    }

    public function destroy($hobby_id){
        $hobby = Hobby::findOrFail($hobby_id);

        \DB::transaction(function()use($hobby){
            $hobby->hobby_memos()->delete();
            $hobby->delete();
    
        });
        $user = Auth::user();

        return view('hobby.index',compact('user'));
    }
    //
    //
}
