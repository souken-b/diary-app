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
    
        $items = $user->works()->orderBy('created_at','desc')->paginate(5);

        return view('work.index',compact('items'));

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
        
        $items = $user->works()->paginate(5);
        

        return view('work.index',compact('items'));

    }

    public function edit($item){
        $work = Work::findOrFail($item);
        return view('work.edit',compact('work'));
    }

    public function update($item,Request $request){
        $params = $request->validate([
            'title'=>'required|max:50',
            'content'=>'required|max:2000',
        ]);

        $work = Work::findOrFail($item);
        $work->fill($params)->save();

        return view('work.show',compact('work'));
    }

    public function show($item){
        
        $work = Work::findOrFail($item);

        return view('work.show',compact('work'));
    }
    public function destroy($item){
        $work = Work::findOrFail($item);
        \DB::transaction(function()use($work){
            $work->work_memos()->delete();
            $work->delete();

        });
        $user = Auth::user();

        $items = $user->works()->paginate(5);

        return view('work.index',compact('items'));


    }
    //
}
