@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('Items') }}</h1>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <div class="alert alert-info">
                    Sample table page
                </div>
                <div class="card">
                    <div class="card-body p-0">
                        <table id="table1" class="table data-table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Episode</th>
                                    <th>Amount</th>
                                    <th>Balance</th>
                                    <th>Date</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($collection as $index => $value)
                                <tr>
                                    <td>{{ $index  + 1 }}</td>
                                    <td>{{ $value->episode->episode_code }}</td>
                                    <td>${{ $value->amount }}</td>
                                    <td>${{ $value->balance }}</td>
                                    <td>{{ $value->date }}</td>
                                    <td>{{ $value->created_at }}</td>
                                    <td>{{ $value->updated_at }}</td>
                                    <td>actions[view, edit, delete]</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer clearfix">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection