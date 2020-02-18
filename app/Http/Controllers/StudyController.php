<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Study;
class StudyController extends Controller
{
    public function index(){
        $user = Auth::user();
        $items = $user->studies()->orderBy('created_at','desc')->paginate(5);

        return view('study.index',compact('items'));

    }

    public function create(){
        $user = Auth::user();
        return view('study.create',compact('user'));
    }

    public function store(Request $request){
        $params = $request->validate([
            'user_id' =>'required|exists:users,id',
            'title'=>'required|max:50',
            'content'=>'required|max:2000',
        ]);
        $user = User::findOrFail($params['user_id']);

        $user->studies()->create($params);

        $items = $user->studies()->orderBy('created_at','desc')->paginate(5);

        return view('study.index',compact('items'));

    }

    public function edit($item){
        $study = Study::findOrFail($study);
        return view('study.edit',compact('study'));
    }

    public function update($item,Request $request){

        $params = $request->validate([
            'title'=>'required|max:50',
            'content'=>'required|max:2000',
        ]);
        $study = Study::findOrFail($item);
        $study->fill($params)->save();
        return view('study.show',compact('study'));
    }

    public function show($item){
        $study = Study::findOrFail($item);
        return view('study.show',compact('study'));
    }

    public function destroy($item){
        $study = Study::findOrFail($item);

        \DB::transaction(function()use($study){
            $study->study_memos()->delete();
            $study->delete();
    
        });
        $user = Auth::user();

        $items = $user->studies()->orderBy('created_at','desc')->paginate(5);

        return view('study.index',compact('items'));
    }
    //
}
