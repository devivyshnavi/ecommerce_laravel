@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <form method="POST" action="/orders/{{$status->id}}" class=" form-group m-auto col-5">
        <h2 class="text-center text-primary">Order status</h2>
        @csrf()
        @method('put')
        <div class="card">
            <h5 class="card-header">Featured</h5>
            <div class="card-body">
                <h5 class="card-title"> Status</h5>
                <p class="card-text">
                <div class="container">

                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="status" value="pending" {{$status->status=="pending"?'checked':''}}>Pending
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-inputs" name="status" value="delivered" {{$status->status=="delivered"?'checked':''}}>Delivered
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-inputs" name="status" value="shipping" {{$status->status=="shipping"?'checked':''}}>Shipping
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="status" value="cancelled" {{$status->status=="cancelled"?'checked':''}}>Cancelled
                        </label>
                    </div>
                    @if($errors->has('status'))
                    <label class="text-danger">{{$errors->first('status')}}</label>
                    @endif
                </div>
                </p>
                <div class="text-center mt-2">
                    <input type="submit" class="btn btn-success" value="submit" />
                </div>
            </div>
        </div>


    </form>

</div>
@endsection