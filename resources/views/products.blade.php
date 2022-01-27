@extends('layouts.app')
<style>
    .btnMargin {
        margin-left: 25%;
    }
</style>
@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Products</h3>
                            <a href="/products/create" class="btn btn-warning btnMargin">Add Product</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div>
                                @if(Session::has('msg'))
                                <label>{{Session::get('msg')}}</label>
                                @endif
                            </div>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sno</th>
                                        <th> Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Sale price</th>
                                        <th>Features</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $sn=1;
                                    @endphp
                                    @foreach($data as $i)
                                    <tr>
                                        <td>{{$sn++}}</td>
                                        <td>{{$i->name}}</td>
                                        <td>{{$i->quantity}}</td>
                                        <td>{{$i->price}}</td>
                                        <td>{{$i->sale_price}}</td>
                                        <td>{{$i->features}}</td>
                                        @if($i->status==1)
                                        <td class="text-success">Active</td>
                                        @else
                                        <td class="text-danger">Inactive</td>
                                        @endif
                                        <td>
                                            <a href="/products/{{$i->id}}/edit" class="btn btn-info">Edit</a>
                                        </td>
                                        <td>
                                            <form action="/products/{{$i->id}}/" method="post">
                                                @csrf()
                                                @method('delete')
                                                <button type="submit" onclick="return confirm('Do you really want to delete product!')" class="btn btn-danger">
                                                    Delete
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            {{$data->links()}}
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