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

        return view('study.index',compact('user'));

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

        return view('study.index',compact('user'));

    }

    public function edit($study_id){
        $study = Study::findOrFail($study_id);
        return view('study.edit',compact('study'));
    }

    public function update($study_id,Request $request){

        $params = $request->validate([
            'title'=>'required|max:50',
            'content'=>'required|max:2000',
        ]);
        $study = Study::findOrFail($study_id);
        $study->fill($params)->save();
        return view('study.show',compact('study'));
    }

    public function show($study_id){
        $study = Study::findOrFail($study_id);
        return view('study.show',compact('study'));
    }

    public function destroy($study_id){
        $study = Study::findOrFail($study_id);

        \DB::transaction(function()use($study){
            $study->study_memos()->delete();
            $study->delete();
    
        });
        $user = Auth::user();

        return view('study.index',compact('user'));
    }
    //
}
