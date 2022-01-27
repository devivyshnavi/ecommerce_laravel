@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <div>
        @if(Session::has('msg'))
        <label>{{Session::get('msg')}}</label>
        @endif
    </div>
    <form method="post" action="/categories">
        <h2 class="text-center text-primary">Add Category</h2>
        @csrf()
        <div class="row form-group m-auto col-5">
            Category <input type="text" class="form-control" name="name" />
            @if($errors->has('name'))
            <label class="text-danger">{{$errors->first('name')}}</label>
            @endif
        </div>
        <div class="row form-group m-auto col-5">
            Description <textarea class="form-control" name="description"> </textarea>
            @if($errors->has('description'))
            <label class="text-danger">{{$errors->first('description')}}</label>
            @endif
        </div>
        <div class="text-center mt-2">
            <input type="submit" class="btn btn-success" value="submit" />
        </div>
    </form>

</div>
@endsection