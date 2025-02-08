@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('Payments') }}</h1>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-right btn-group btn-group-sm">
                            @can(App\Constants\PermisionConstants::createPayment)
                           {{-- <button data-toggle="modal" data-target="#add-payment-modal" type="button" class="btn btn-primary">
                                <i class="fa fa-plus"></i> Generate
                            </button>--}}
                            <a href="{{ route('payment.create') }}" class="btn btn-primary">
                                <i class="fa fa-plus"></i> Generate
                           </a>
                            @endcan
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <table id="table1" class="table data-table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>patient</th>
                                    <th>Episode</th>
                                    <th>Amount</th>
                                    <th>Balance</th>
                                    <th>Narration</th>
                                    <th>Date</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($collection as $index => $value)
                                <tr>
                                    <td>{{ $index  + 1 }}</td>
                                    <td>{{ $value->episode->patient->name }} {{ $value->episode->patient->surname }}</td>
                                    <td>{{ $value->episode->episode_code }}</td>
                                    <td>${{ $value->amount }}</td>
                                    <td>${{ $value->balance }}</td>
                                    <td>{{ $value->narration }}</td>
                                    <td>{{ $value->date }}</td>
                                    <td>{{ $value->created_at }}</td>
                                    <td>{{ $value->updated_at }}</td>
                                    {{--@can(App\Constants\PermisionConstants::viewPayment)
                                    @endcan--}}
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

<div class="modal lg fade" id="add-payment-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Episode number</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="episode_form" method="post" action="{{ route('payment.store') }}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name">Designation</label>
                                <select name="ward" class="form-control js-example-basic-single form-control multiple" style="padding: 6px 12px !important; width: 100% !important">
                                    @foreach($designations as $index => $designation)
                                    <option value="{{ $designation->id }}" selected="selected">{{ $designation->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name">patient</label>
                                <select name="patient_id" class="form-control js-example-basic-single form-control multiple" style="padding: 6px 12px !important; width: 100% !important">
                                    @foreach($patients as $index => $value)
                                    <option value="{{ $value->patient_id }}" selected="selected">{{ $value->name }} {{ $value->surname }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name">patient Group</label>
                                <select name="patient_type" class="form-control js-example-basic-single form-control multiple" style="padding: 6px 12px !important; width: 100% !important">
                                    <option value="InPatient" selected="selected">In patient</option>
                                    <option value="OutPatient" selected="selected">Out patient</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name">Payment Method</label>
                                <select name="" class="form-control js-example-basic-single form-control multiple" style="padding: 6px 12px !important; width: 100% !important">
                                    <option value="Cash" selected="selected">Cash</option>
                                    <option value="Medical_aid">Medica Aid</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name">Amount</label>
                                <input class="form-control" name="amount" type="number" placeholder="Date of birth" required>

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name">Narration</label>
                                <input class="form-control" name="narration" type="text" placeholder="Payment narration" required>
                            </div>
                        </div>
                    </div>
                    {{--<div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name">Narration</label>
                                <input class="form-control" name="narration" type="text" placeholder="Payment narration" required>
                            </div>
                        </div>
                    </div>--}}
                </form>
            </div>
            <div class="card-footer">
                <div class="form-group pull-right">
                    <button onclick="$('#episode_form').submit()" class="btn btn-secondary float-right mr-2">Update Details</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
