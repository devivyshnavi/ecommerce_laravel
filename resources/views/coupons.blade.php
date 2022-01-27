@extends('layouts.app')
<style>
    .btnMargin {
        margin-left: 25%;
    }
</style>
@section('content')
<div class="content-wrapper">
    @if(Session::has('msg'))
    <div class="alert alert-success">{{Session::get('msg')}}</div>
    @endif
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Coupons List</h3>
                            <a href="coupons/create" class="btn btn-warning btnMargin">Add Coupon</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sno</th>
                                        <th>Code</th>
                                        <th>Type</th>
                                        <th>Value</th>
                                        <th>Cart value</th>
                                        <th>Status</th>
                                        <th colspan="2" class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $sn=1;
                                    @endphp
                                    @foreach($data as $i)
                                    <tr>
                                        <td>{{$sn++}}</td>
                                        <td>{{$i->code}}</td>
                                        <td>{{$i->type}}</td>
                                        <td>{{$i->value}}</td>
                                        <td>{{$i->cart_value}}</td>
                                        @if($i->status==1)
                                        <td class="text-success">Active</td>
                                        @else
                                        <td class="text-danger">In Active</td>
                                        @endif
                                        <td>
                                            <a href="/coupons/{{$i->id}}/edit" class="btn btn-info">Edit</a>
                                        </td>
                                        <td>
                                            <form action="/coupons/{{$i->id}}/" method="post">
                                                @csrf()
                                                @method('delete')
                                                <button type="submit" onclick="return confirm('Do you really want to delete category!')" class="btn btn-danger">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection