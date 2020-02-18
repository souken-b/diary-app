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
        $items = $user->hobbies()->orderBy('created_at','desc')->paginate(5);

        return view('hobby.index',compact('items'));

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

        $items = $user->hobbies()->orderBy('created_at','desc')->paginate(5);
        
        return view('hobby.index',compact('items'));

    }

    public function edit($item){
        $hobby = Hobby::findOrFail($item);
        return view('hobby.edit',compact('hobby'));
    }

    public function update($item,Request $request){
        $params = $request->validate([
            'title'=>'required|max:50',
            'content'=>'required|max:2000',
        ]);

        $hobby = Hobby::findOrFail($item);
        $hobby->fill($params)->save();

        return view('hobby.show',compact('hobby'));
    }

    public function show($item){
        $hobby = Hobby::findOrFail($item);

        return view('hobby.show',compact('hobby'));
    }

    public function destroy($item){
        $hobby = Hobby::findOrFail($item);

        \DB::transaction(function()use($hobby){
            $hobby->hobby_memos()->delete();
            $hobby->delete();
    
        });
        $user = Auth::user();
        $items = $user->hobbies()->orderBy('created_at','desc')->paginate(5);

        return view('hobby.index',compact('items'));
    }
    //
    //
}
