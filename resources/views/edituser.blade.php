@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <form method="POST" action="/users/{{$data->id}}">
        <h2 class="text-center text-primary">User</h2>
        @csrf()
        @method('PUT')
        <div class="row form-group m-auto col-5">
            First Name <input type="text" class="form-control" name="fname" value="{{$data->first_name}}" />
            @if($errors->has('fname'))
            <label class="text-danger">{{$errors->first('fname')}}</label>
            @endif
        </div>
        <div class="row form-group m-auto col-5">
            Last Name <input type="text" class="form-control" name="lname" value="{{$data->last_name}}" />
            @if($errors->has('lname'))
            <label class="text-danger">{{$errors->first('lname')}}</label>
            @endif
        </div>
        <div class="row form-group m-auto col-5">
            Email <input type="email" class="form-control" name="email" value="{{$data->email}}" />
            @if($errors->has('email'))
            <label class="text-danger">{{$errors->first('email')}}</label>
            @endif
        </div>
        <div class="row form-group m-auto col-5">
            Role
            <select name="role" class="form-control">
                <option value="">select role</option>
                @foreach($role as $i)
                <option value="{{$i->role_type}}" {{($i->role_type == $data->role_type)?'selected':''}}>{{$i->role_type}}</option>
                @endforeach
            </select>
        </div>
        <div class="row form-group m-auto col-5">
            <h6> status</h6>
        </div>
        <div class="row form-group m-auto col-5">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="status" value="1" {{($data->status == "1")?'checked':''}}>Active
                </label>
            </div>
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="status" value="0" {{($data->status == "0")?'checked':''}}>Inactive
                </label>
            </div>
            @if($errors->has('status'))
            <label class="text-danger">{{$errors->first('status')}}</label>
            @endif
        </div>
        <input type="hidden" value="{{$data->id}}" name="uid" />
        <div class="text-center mt-2">
            <input type="submit" class="btn btn-success" value="submit" />
        </div>
    </form>

</div>
@endsection