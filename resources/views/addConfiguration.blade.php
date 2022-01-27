@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <div>
        @if(Session::has('msg'))
        <label>{{Session::get('msg')}}</label>
        @endif
    </div>
    <form method="post" action="/configuration">
        <h2 class="text-center text-primary">Add Configuration</h2>
        @csrf()
        <div class="row form-group m-auto col-5">
            Contact <input type="text" class="form-control" name="phone" />
            @if($errors->has('phone'))
            <label class="text-danger">{{$errors->first('phone')}}</label>
            @endif
        </div>
        <div class="row form-group m-auto col-5">
            Admin email <input type="email" class="form-control" name="adminEmail" />
            @if($errors->has('adminEmail'))
            <label class="text-danger">{{$errors->first('adminEmail')}}</label>
            @endif
        </div>
        <div class="row form-group m-auto col-5">
            Notification email <input type="email" class="form-control" name="notificationEmail" />
            @if($errors->has('notificationEmail'))
            <label class="text-danger">{{$errors->first('notificationEmail')}}</label>
            @endif
        </div>

        <div class="text-center mt-2">
            <input type="submit" class="btn btn-success" value="submit" />
        </div>
    </form>

</div>
@endsection