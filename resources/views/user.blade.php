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
                            <h3 class="card-title">Users List</h3>
                            <a href="/users/create" class="btn btn-warning btnMargin">Add User</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sno</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th colspan="2">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $sn=1;
                                    @endphp
                                    @foreach($data as $i)
                                    <tr>
                                        <td>{{$sn++}}</td>
                                        <td>{{$i->first_name}}</td>
                                        <td>{{$i->last_name}}</td>
                                        <td>{{$i->email}}</td>
                                        <td>{{$i->role_type}}</td>
                                        @if($i->status==1)
                                        <td class="text-success">Active</td>
                                        @else
                                        <td class="text-danger">Inactive</td>
                                        @endif
                                        <td>
                                            <a href="/users/{{$i->id}}/edit" class="btn btn-info">Edit</a>
                                        </td>
                                        <td>
                                            <form action="/users/{{$i->id}}/" method="post">
                                                @csrf()
                                                @method('delete')
                                                <button type="submit" onclick="return confirm('Do you really want to delete user!')" class="btn btn-danger">
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