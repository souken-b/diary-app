<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    // public function index(){
    //     $users = User::orderBy('created_at', 'desc')->get();

    //     return view('user.index',compact('users'));
    // }

    public function index(Request $request){
        $user = Auth::user();
        return view('user.index',compact('user'));
    }
    //
}
