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
                            <h3 class="card-title">Category List</h3>
                            <a href="categories/create" class="btn btn-warning btnMargin">Add category</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <table class="table table-bordered table-striped">
                                <thead>
                                    @php
                                    $sn=1;
                                    @endphp
                                    <tr>
                                        <th>Sno</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th colspan="2" class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($data as $i)
                                    <tr>
                                        <td>{{$sn++}}</td>
                                        <td>{{$i->name}}</td>
                                        <td>{{$i->description}}</td>
                                        <td>
                                            <a href="/categories/{{$i->id}}/edit" class="btn btn-info">Edit</a>
                                        </td>
                                        <td>
                                            <form action="/categories/{{$i->id}}/" method="post">
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