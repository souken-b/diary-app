@extends('layouts.index')

@section('title','all study content')

@section('header')
    <h3 class="text-left mt-3 ml-3">Study Content</h3>
    <ul class="nav justify-content-end mr-5">
        <li class="nav-item">
            <a class="nav-link active" href="{{url('usertop')}}">Top page</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{action('AdminUserController@index')}}">Login page</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{action('StudyController@create')}}">Create post</a>
        </li>
    </ul>
@endsection

@section('maincontent')
    @foreach($user->studies()->select('id','title','content','created_at','updated_at')->get() as $study)
    <div class="card mb-2">
        <div class="card-header">
            @if($study->title != null)
            <span class="text-left"><h4><a class="text-secondary" href="{{action('StudyController@show',['study'=>$study])}}">{{$study->title}}</a></h4></span>
            <div class="text-right">
                <span class=" mr-3">{{"last modified　".$study->updated_at->format('Y年m月d日H時i分')}}</span>
                <span class="">{{"upload　".$study->created_at->format('Y年m月d日H時i分')}}</span>
            </div> 
            @else
            <span class="text-left"><h4><a class="text-secondary" href="{{action('StudyController@index')}}">タイトルがありません</a></h4></span>
            @endif
        </div>
        @if($study->content != null)
            <div class="card-body text center">{{$study->content}}</div>
        @else
            <div class="card-body text center">内容が記入されていません</div>
        @endif
    </div>
    @endforeach
@endsection
    
       