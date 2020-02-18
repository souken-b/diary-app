@extends('layouts.edit')
@section('title','family edit page')
@section('content')
    <form method="POST" action="{{action('FamilyController@update',['family'=>$family])}}">
        @csrf 
        @method('PUT')
        <div class="card ">
            <div class="card-header ">
                <textarea id="title" type="text" name="title" class="py-1" style="min-width: 100%" rows=1>{{old('title') ? :$family->title }}</textarea>
            </div>
            <div class="card-body text center">
                <textarea id="content" name="content" class="py-1" style="min-width: 100%" rows=7>{{old('content') ? : $family->content}}</textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-secondary mt-3">Update</button>
        <button type="button" class="btn btn-secondary mt-3" onclick="location.href='{{action('FamilyController@index')}}'">Cancel</button>
    </form>
@endsection

