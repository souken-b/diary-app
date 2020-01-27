<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Work;

class WorkController extends Controller
{
    public function index(){
        $user = Auth::user();

        return view('work.index',compact('user'));

    }

    public function create(){
        $user = Auth::user();
        return view('work.create',compact('user'));
    }

    public function store(Request $request){

        $params = $request->validate([
            'user_id' => 'required|exists:users,id',
            'title' =>'required|max:50',
            'content' => 'required|max:2000',
        ]);
        $user = User::findOrFail($params['user_id']);

        $user->works()->create($params);
        

        return view('work.index',compact('user'));

    }

    public function edit($work_id){
        $work = Work::findOrFail($work_id);
        return view('work.edit',compact('work'));
    }

    public function update($work_id,Request $request){
        $params = $request->validate([
            'title'=>'required|max:50',
            'content'=>'required|max:2000',
        ]);

        $work = Work::findOrFail($work_id);
        $work->fill($params)->save();

        return view('work.show',compact('work'));
    }

    public function show($work_id){
        $work = Work::findOrFail($work_id);

        return view('work.show',compact('work'));
    }
    public function destroy($work_id){
        $work = Work::findOrFail($work_id);
        \DB::transaction(function()use($work){
            $work->work_memos()->delete();
            $work->delete();

        });
        $user = Auth::user();

        return view('work.index',compact('user'));


    }
    //
}
