@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <form method="POST" action="/coupons/{{$data->id}}" class=" form-group m-auto col-5">
        <h2 class="text-center text-primary">Coupons</h2>
        @csrf()
        @method('put')
        <div>
            Code<input type="text" class="form-control" name="code" value="{{$data->code}}" />
            @if($errors->has('code'))
            <label class="text-danger">{{$errors->first('code')}}</label>
            @endif
        </div>
        <div>
            Type
            <select name="type" class="form-control">
                <option value="">Select type</option>
                <option value="fixed" {{($data->type=='fixed')?'selected':''}}>Fixed</option>
                <option value="percent" {{($data->type=='percent')?'selected':''}}>Percent</option>
            </select>
            Value<input type="number" class="form-control" name="value" value="{{$data->value}}" />
            @if($errors->has('value'))
            <label class="text-danger">{{$errors->first('value')}}</label>
            @endif
        </div>
        <div>
            Cart value<input type="number" class="form-control" name="cart_value" value="{{$data->cart_value}}" />
            @if($errors->has('cart_value'))
            <label class="text-danger">{{$errors->first('cart_value')}}</label>
            @endif
        </div>
        <div>
            Status
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="status" value="1" {{$data->status=="1"?'checked':''}}>Active
                </label>
            </div>
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="status" value="0" {{$data->status=="0"?'checked':''}}>Inactive
                </label>
            </div>
            @if($errors->has('status'))
            <label class="text-danger">{{$errors->first('status')}}</label>
            @endif
        </div>
        <div class="text-center mt-2">
            <input type="submit" class="btn btn-success" value="submit" />
        </div>
    </form>

</div>
@endsection