@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    @if(Session::has('msg'))
    <div class="alert alert-info">{{Session::get('msg')}}</div>
    @endif
    <form method="POST" enctype="multipart/form-data" action="/cms/{{$data->id}}">
        <h2 class="text-center text-primary">CMS</h2>
        @csrf()
        @method("put")
        <div class="form-group m-auto col-5">
            Title <input type="text" class="form-control" name="title" value="{{$data->title}}">
            @if($errors->has('title'))
            <label class="text-danger">{{$errors->first('title')}}</label>
            @endif
        </div>

        <div class="form-group m-auto col-5">
            Description
            <textarea class="form-control" name="description"> {{$data->title}}</textarea>
            @if($errors->has('description'))
            <label class="text-danger">{{$errors->first('description')}}</label>
            @endif
        </div>
        <div class="form-group m-auto col-5">
            Image <input type="file" class="form-control" name="image">
            @if($errors->has('image'))
            <label class="text-danger">{{$errors->first('image')}}</label>
            @endif
        </div>
        <div class="text-center mt-2">
            <input type="submit" class="btn btn-success" value="submit" />
        </div>
    </form>
</div>
@endsection