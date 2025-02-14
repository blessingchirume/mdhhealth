@extends('layouts.app')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Role Permissions</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">roles</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                                Give permission
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example" class="table  nowrap align-middle">
                            <tbody>
                                <tr>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->guard_name }}</td>
                                    <td>{{ $role->created_at }}</td>
                                    <td>{{ $role->updated_at }}</td>
                                    <td>
                                        <a href="/admin/role/{{$role->id}}" type="button" class='btn btn-danger btn-sm'>
                                            <i class="fas fa-trash"></i> revoke
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Permission</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table  nowrap align-middle">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Guard Name</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($permissions as $index => $permission)
                                <tr>
                                    <td>{{ $index +  1 }}</td>
                                    <td>{{ $permission->name }}</td>
                                    <td>{{ $permission->guard_name }}</td>
                                    <td>{{ $permission->created_at }}</td>
                                    <td>{{ $permission->updated_at }}</td>
                                    <td>
                                        <a href="{{route('role.revoke-permission', [ $role, $permission ])}}" type="button" class='btn btn-danger btn-sm'>
                                            <i class="fas fa-trash"></i> remove
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Permission Details</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="orphan_registration" method="post" action="{{ route('role.give-permission', $role) }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Permission Name</label>
                                    <select name="name" class="form-control" style="padding: 6px 12px !important; width: 100% !important">
                                        @foreach ($availablePermissions as $permission)
                                        <option value="{{ $permission->name }}" selected="selected">{{ $permission->name }}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <!-- /.container-fluid -->
</section>

@endsection