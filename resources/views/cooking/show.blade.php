@extends('layouts.show')

@section('title','cooking content detail')

@section('header')
    <h3 class="ml-5">{{"No.".$cooking->id}}</h3>
    <ul class="nav justify-content-end mr-5">
        <li class="nav-item">
            <a class="nav-link active" href="{{url('usertop')}}">Top page</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{action('CookingController@index')}}">Back to index </a>
        </li>
    </ul>
@endsection

@section('maincontent')
    <div class="btn-group mb-3" role="group">
        <form method="POST" action="{{action('CookingController@edit',['cooking'=>$cooking])}}">
            @csrf 
            @method('GET')
            <button class="btn btn-default mr-2">Edit</button>
        </form>
        <form method="POST" action="{{action('CookingController@destroy',['cooking'=>$cooking])}}">
            @csrf 
            @method('DELETE')
            <button class="btn btn-default"　onclick="return ">Delete post</button>
        </form> 
    </div>
    <div class="card ">
        <div class="card-header">
            <span class="text-left"><h4>{{$cooking->title}}</h4></span>
            <div class="text-right">
                <span class=" mr-2">{{"last modified　".$cooking->updated_at->format('Y年m月d日H時i分')}}</span>
                <span >{{"upload　".$cooking->created_at->format('Y年m月d日H時i分')}}</span>
            </div> 
        </div>
        <div class="card-body text-center">{{$cooking->content}}</div>
    </div>
@endsection

@section('subcontent')
    <div class="accordion col-7" id="accordionExample">
        @if($cooking->cooking_memos()->select('content')->get() != null)
            @foreach($cooking->cooking_memos()->select('id','content')->get() as $memo)
                <div class="card ">
                    <div class="card-header" id="{{'heading'.$memo->id}}">
                        <h2 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="{{'#collapse'.$memo->id}}" aria-expanded="true" aria-controls="{{'collapse'.$memo->id}}">
                                {{str_limit($memo->content, 25)}}
                            </button>
                        </h2>
                    </div>
                    <div id="{{'collapse'.$memo->id}}" class="collapse" aria-labelledby="{{'heading'.$memo->id}}" data-parent="#accordionExample">
                        <div class="card-body">
                            {{$memo->content}}
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection

@section('create_subcontent')
    <div class="card col-4 ml-3 px-0">
        <div class="card-body text-center px-1 py-1 ">
        <form method="POST" class="px-0 pt-0" action="{{action('CookingMemoController@store')}}">
            @csrf 
            <input name="cooking_id" type="hidden" value="{{$cooking->id}}">
                <textarea id="content" class="mx-0 " style="min-width: 100%" name="content" rows=15 placeholder="メモの内容を入力してください"></textarea>
                <br>
                <button type="submit" class="btn btn-default">
                    Add memo
                </button>
            </div>
        </form>
        </div>
    </div>
@endsection

            