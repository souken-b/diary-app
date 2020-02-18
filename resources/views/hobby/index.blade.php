@extends('layouts.index')

@section('title','all hobby content')

@section('header')
    <h3 class="text-left mt-3 ml-3">Hobby Content</h3>
    <ul class="nav justify-content-end mr-5">
        <li class="nav-item">
            <a class="nav-link active" href="{{url('usertop')}}">Top page</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{action('AdminUserController@index')}}">Login page</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{action('HobbyController@create')}}">Create post</a>
        </li>
    </ul>
@endsection

@section('maincontent')
    @foreach($user->hobbies()->select('id','title','content','created_at','updated_at')->get() as $hobby)
    <div class="card mb-2">
        <div class="card-header">
            @if($hobby->title != null)
            <span class="text-left"><h4><a class="text-secondary" href="{{action('HobbyController@show',['hobby'=>$hobby])}}">{{$hobby->title}}</a></h4></span>
            <div class="text-right">
                <span class=" mr-3">{{"last modified　".$hobby->updated_at->format('Y年m月d日H時i分')}}</span>
                <span class="">{{"upload　".$hobby->created_at->format('Y年m月d日H時i分')}}</span>
            </div> 
            @else
            <span class="text-left"><h4><a class="text-secondary" href="{{action('HobbyController@index')}}">タイトルがありません</a></h4></span>
            @endif
        </div>
        @if($hobby->content != null)
            <div class="card-body text center">{{$hobby->content}}</div>
        @else
            <div class="card-body text center">内容が記入されていません</div>
        @endif
    </div>
    @endforeach
@endsection
      