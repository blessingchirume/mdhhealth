@extends('layouts.app')

@section('content')
<section class="content">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">User &raquo; Edit</h1>
                </div><!-- /.col -->
            </div>
        </div>
    </div>

    <div class="card">
        <form id="update-user-form" method="post" action="{{route('users.update', $user)}}">
            <div class="card-header">
                <a href="{{ route('users.index') }}" type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    back
                </a>
            </div>
            <div class="card-body">

                {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="name">First Name</label>
                            <input class="form-control" id="name" name="name" type="text" placeholder="First Name" value="{{$user->name}}" required>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="name">Last Name</label>
                            <input class="form-control" id="last_name" name="surname" type="text" placeholder="Last Name" value="{{$user->surname}}" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="useer_role">Phone</label>
                            <input class="form-control" id="phone" name="phone" type="text" placeholder="Phone" value="{{$user->phone}}" required>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" id="email" name="email" type="text" placeholder="Email" value="{{$user->email}}" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="name">Designation</label>
                            <input class="form-control" id="role" name="designation" type="text" placeholder="role" value="{{ $user->designation->name }}" readonly required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="name">Role</label>
                            <input class="form-control" id="role" name="role" type="text" placeholder="role" value="{{ $user->roles[0]->name ?? 'unassigned' }}" readonly required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="form-group pull-left">
                    <button type="button" class="btn btn-secondary float-right mr-2" data-toggle="modal" data-target="#assign-role-modal">Assign Role</button>
                    <button type="button" class="btn btn-secondary float-right mr-2" data-toggle="modal" data-target="#update-user-modal">Update Details</button>
                    <button type="button" class="btn btn-danger  float-right mr-2" data-toggle="modal" data-target="#delete-user-modal">Delete user</button>
                </div>
            </div>
        </form>
    </div>
</section>
<div class="modal fade" id="update-user-modal" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">update user</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-sm-12">
                    <div class="alert alert-danger"><strong>Warning</strong> You are about to update <strong>{{ $user->name }} {{$user->surname}}</strong>, this action cannot be reversed</div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-secondary" onclick="$('#update-user-form').submit()">update</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="delete-user-modal" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete user</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-sm-12">
                    <form method="post" id="delete-user-form" action="{{ route('users.delete', $user) }}" enctype="">
                        {{ csrf_field() }}
                        <div class="alert alert-danger"><strong>Warning</strong> You are about to remove <strong>{{ $user->name }} {{$user->surname}}</strong>, this action cannot be reversed</div>
                    </form>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-secondary" onclick="$('#delete-user-form').submit()">Delete</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="assign-role-modal" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Assign Role</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-sm-12">
                    <form method="post" id="assign-role-form" action="{{ route('users.role.assign', $user) }}" enctype="">
                        {{ csrf_field() }}
                        <select name="role" id="role" class="form-control">
                            @foreach($roles as $value)
                            <option value="{{ $value->name}}">{{ $value->name}}</option>
                            @endforeach
                        </select>
                    </form>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-secondary" onclick="$('#assign-role-form').submit()">Assign</button>
            </div>
        </div>
    </div>
</div>
@endsection
