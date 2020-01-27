<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Sport;
use App\User;
class SportController extends Controller
{
    public function index(){
        $user = Auth::user();

        return view('sport.index',compact('user'));

    }
    public function create(){
        $user = Auth::user();

        return view('sport.create',compact('user'));
    }
    public function show($sport_id){
        $sport =  Sport::findOrFail($sport_id);
        return view('sport.show',compact('sport'));

    }
    public function store(Request $request){
        $params = $request->validate([
            'user_id'=>'required|exists:users,id',
            'title'=>'required|max:50',
            'content'=>'required|max:2000',
        ]);
        $user = User::findOrFail($params['user_id']);
        $user->sports()->create($params);

        return view('sport.index',compact('user'));

    }
    public function update($sport_id,Request $request){
        $params = $request->validate([
            'title'=>'required|max:50',
            'content'=>'required|max:2000',
        ]);
        $sport = Sport::findOrFail($sport_id);
        $sport->fill($params)->save();
        return view('sport.show',compact('sport'));
    }
    public function edit($sport_id){
        $sport = Sport::findOrFail($sport_id);
        return view('sport.edit',compact('sport'));

    }
    public function destroy($sport_id){
        $sport = Sport::findOrFail($sport_id);
        
        \DB::transaction(function()use($sport){
            $sport->sport_memos()->delete();
            $sport->delete();
        });
        $user = Auth::user();

        return view('sport.index',compact('user'));
    }

    
    //
}
