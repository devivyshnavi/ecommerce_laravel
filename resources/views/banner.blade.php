@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    @if(Session::has('msg'))
    <div class="alert alert-info">{{Session::get('msg')}}</div>
    @endif
    <form method="POST" enctype="multipart/form-data" action="/banners">
        <h2 class="text-center text-primary">Add Images</h2>
        @csrf()
        <div class="form-group m-auto col-5">
            Image <input type="file" class="form-control" name="image[]" multiple>
        </div>
        <div class="form-group m-auto col-5">
            Caption
            <textarea class="form-control" name="caption"></textarea>
        </div>
        <div class="text-center mt-2">
            <input type="submit" class="btn btn-success" value="submit" />
        </div>
    </form>
</div>
@endsection