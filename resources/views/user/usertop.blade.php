@extends('layouts.usertop')
@section('title','User Top Page')

@section('header')
    <h3 class="text-align-left mt-3 ml-3">{{$user->name}}</h3>
    
    <ul class="nav justify-content-end mr-5">
        
        <li class="nav-item">
            <a class="nav-link" href="{{action('AdminUserController@index')}}">Login Page</a>
        </li>
    </ul>
@endsection

@section('work')
<div class="card">
    <div class="card-header">
        <h5 class="card-title"><a href="{{action('WorkController@index')}}" class="text-secondary">Work</a></h5>
    </div>
    <div class="card-body">
    <p class="card-text">{{"total contents amount: ".$user->works()->get()->count()}}</p>
    </div>
</div>
@endsection

@section('study')
<div class="card">
    <div class="card-header">
        <h5 class="card-title"><a href="{{action('StudyController@index')}}" class="text-secondary">Study</a></h5>
    </div>
    <div class="card-body">
    <p class="card-text">{{"total contents amount: ".$user->studies()->get()->count()}}</p>
    </div>
</div> 
@endsection

@section('family')
<div class="card">
    <div class="card-header">
        <h5 class="card-title"><a href="{{action('FamilyController@index')}}" class="text-secondary">Family</a></h5>
    </div>
    <div class="card-body">
    <p class="card-text">{{"total contents amount: ".$user->families()->get()->count()}}</p>
    </div>
</div>
@endsection

@section('hobby')
<div class="card">
    <div class="card-header">
        <h5 class="card-title"><a href="{{action('HobbyController@index')}}" class="text-secondary">Hobby</a></h5>
    </div>
    <div class="card-body">
    <p class="card-text">{{"total contents amount: ".$user->hobbies()->get()->count()}}</p>
    </div>
</div>
@endsection

@section('cook')
<div class="card">
    <div class="card-header">
        <h5 class="card-title"><a href="{{action('CookingController@index')}}" class="text-secondary">Cooking</a></h5>
    </div>
    <div class="card-body">
        <p class="card-text">{{"total contents amount: ".$user->cooks()->get()->count()}}</p>
    </div>
</div>
@endsection

@section('sport')
<div class="card">
    <div class="card-header">
        <h5 class="card-title"><a href="{{action('SportController@index')}}" class="text-secondary">Sport</a></h5>
    </div>
    <div class="card-body">
        <p class="card-text">{{"total contents amount: ".$user->sports()->get()->count()}}</p>
    </div>
</div>
@endsection