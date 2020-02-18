@extends('layouts.create')
@section('title','study create page')
@section('content')
    <form method="POST" action="{{action('StudyController@store')}}">
        @csrf 
        <input name="user_id" type="hidden" value="{{$user->id}}">
        <div class="card ">
            <div class="card-header ">
                <textarea id="title" name="title" class="py-1" style="min-width: 100%" rows=1 placeholder="タイトルを入力してください"></textarea>
            </div>
            <div class="card-body text center">
                <textarea id="content" name="content" class="py-1" style="min-width: 100%" rows=7 placeholder="本文を入力してください"></textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-secondary mt-3">Submit</button>
        <button type="button" class="btn btn-secondary mt-3" onclick="location.href='{{action('StudyController@index')}}'">Cancel</button>
    </form>
@endsection