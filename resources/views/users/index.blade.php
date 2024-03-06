@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('Users') }}</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header">
                        <div class="float-right btn-group btn-group-sm">
                            @can(App\constants\PermisionConstants::createUser)
                            <a href="{{ route('users.create') }}" class="btn btn-primary">
                                <i class="fa fa-plus"></i> Generate
                            </a>
                            @endcan
                        </div>
                    </div>
                    <div class="card-body p-0">

                        <table id="table1" class="table data-table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Surname</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->surname }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <a href="{{ route('users.show', $user)}}" type="button" class='btn btn-secondary btn-sm'>
                                            <i class="fas fa-eye"></i> view
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
