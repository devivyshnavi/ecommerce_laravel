@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    @if(Session::has('msg'))
    <div class="alert alert-info">{{Session::get('msg')}}</div>
    @endif
    <form method="POST" enctype="multipart/form-data" action="/banners/{{$data->id}}">
        <h2 class="text-center text-primary">update banner</h2>
        @csrf()
        @method('PUT')
        <div class="form-group m-auto col-5">
            Caption
            <textarea class="form-control" name="caption">{{$data->caption}}</textarea>
        </div>
        <div class="form-group m-auto col-5">
            Image <input type="file" class="form-control" name="image">
        </div>
        <div class="form-group m-auto col-5">
            <img src="{{url('uploads/'.$data->image_path)}}" height="100px" width="100px" class="mt-2" />
        </div>
        <input type="hidden" name="uid" value="{{$data->id}}" />
        <div class="text-center mt-2">
            <input type="submit" class="btn btn-success" value="submit" />
        </div>
    </form>
</div>
@endsection