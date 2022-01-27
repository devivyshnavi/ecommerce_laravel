@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <div>
        @if(Session::has('msg'))
        <label>{{Session::get('msg')}}</label>
        @endif
    </div>
    <form method="post" action="/categories/{{$data->id}}">
        <h2 class="text-center text-primary">Edit Category</h2>
        @csrf()
        @method('PUT')
        <div class="row form-group m-auto col-5">
            Category <input type="text" class="form-control" name="name" value="{{$data->name}}" />
            @if($errors->has('name'))
            <label class="text-danger">{{$errors->first('name')}}</label>
            @endif
        </div>
        <div class=" row form-group m-auto col-5">
            Description <textarea class="form-control" name="description">{{$data->description}} </textarea>
            @if($errors->has('description'))
            <label class="text-danger">{{$errors->first('description')}}</label>
            @endif
        </div>
        <input type="hidden" value="{{$data->id}}" name="uid" />
        <div class="text-center mt-2">
            <input type="submit" class="btn btn-success" value="submit" />
        </div>
    </form>

</div>
@endsection