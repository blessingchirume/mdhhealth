@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12">
                <h1 class="m-0">{{ $episode->episode_code }}</h1>
                <div class="float-right btn-group btn-group-sm">
                    <a href="{{ route('episode.create-chargesheet', $episode) }}" class="btn btn-secondary">
                        <i class="fa fa-eye"></i> View charge sheet
                    </a>
                    @can(App\constants\PermisionConstants::createPayment)
                    <a data-toggle="modal" data-target="#add-payment-modal" class="btn btn-success">
                        <i class="fa fa-money-bill-alt"></i> Make Payment
                    </a>
                    @endcan

                    <a href="{{ route('episode.create-chargesheet', $episode) }}" class="btn btn-warning">
                        <i class="fa fa-unlock"></i> Dischage Patient
                    </a>
                </div>
            </div>

        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <section class="content">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="float-left">Vitals</h4>
                            <div class="float-right btn-group btn-group-sm">
                                @can(App\constants\PermisionConstants::createVital)
                                {{--<button data-toggle="modal" data-target="#add-vital-modal" type="button" class="btn btn-primary">
                                    <i class="fa fa-plus"></i> Generate
                                </button>--}}

                                <a href="{{ route('patient.vitals.show', $episode) }}" class="btn btn-primary">
                                    <i class="fa fa-plus"></i> Generate
                                </a>
                                @endcan
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="table2" class="table table-striped table-bordered">
                                <tbody>
                                    @foreach($episode->vitals as $value)
                                    <tr>
                                        <td><strong>{{ $value->name }}</strong></td>
                                        <td>{{ $value->value }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>

                <section class="content">
                    <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Treatment Plan</a>
                        </li>
                        <!--li class="nav-item">
                            <a class="nav-link" id="custom-content-below-messages-tab" data-toggle="pill" href="#custom-content-below-messages" role="tab" aria-controls="custom-content-below-messages" aria-selected="false">Update</a>
                        </!--li-->

                    </ul>

                    <div class="tab-content" id="custom-content-below-tabContent">
                        <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
                            <div class="card">
                                <div class="card-header">
                                    <div class="float-right btn-group btn-group-sm">
                                        <button data-toggle="modal" data-target="#add-item-modal" type="button" class="btn btn-primary">
                                            <i class="fa fa-plus"></i> Generate
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="table1" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Item Code</th>
                                                <th>Item Description</th>
                                                <th>Item Group</th>
                                                <th>Quantity</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($episode->items as $value)
                                            <tr>
                                                <td>{{ $value->id }}</td>
                                                <td>{{ $value->item_code }}</td>
                                                <td>{{ $value->item_description }}</td>
                                                <td>{{ $value->item_group }}</td>
                                                <td>{{ $value->pivot->quantity }}</td>

                                                <td>
                                                    <a href="{{ route('patient.show', $value)}}"><i class="fa fa-eye success m-2"></i></a>
                                                    <a href="{{ route('patient.show', $value)}}"><i class="fa fa-edit primary m-2"></i></a>
                                                    <a href="{{ route('patient.show', $value)}}"><i class="fa fa-trash m-2"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="custom-content-below-messages" role="tabpanel" aria-labelledby="custom-content-below-messages-tab">
                            <div class="card">
                                <div class="card-body">
                                    <form method="post" action="">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="name">id number</label>
                                                    <input class="form-control" name="reading_number" value="43-170001N80" type="text" placeholder="id number" required>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="name">Plan</label>
                                                    <select name="tank" class="form-control js-example-basic-single form-control multiple" style="padding: 6px 12px !important; width: 100% !important">
                                                        <option value="" selected="selected">Cash</option>
                                                        <option value="" selected="selected">Medical aid</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input class="form-control" name="purchase" value="Blessing" type="text" placeholder="Name" required>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="name">Surname</label>
                                                    <input class="form-control" name="opening_balance" value="Chirume" type="text" placeholder="Surname" required>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="float-left">Notes from attendees</h4>
                        <div class="float-right btn-group btn-group-sm">
                            <button data-toggle="modal" data-target="#add-note-modal" type="button" class="btn btn-primary">
                                <i class="fa fa-plus"></i> Generate
                            </button>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="timeline">
                                <div class="timeline timeline-inverse">
                                    <div class="time-label">
                                        <span class="">
                                            Observations
                                        </span>
                                    </div>
                                    @foreach($observations as $notes)
                                    <div>
                                        <i class="fas fa-edit bg-secondary"></i>
                                        <div class="timeline-item">
                                            <span class="time"><i class="far fa-clock"></i>{{ $notes->created_at }}</span>
                                            <h3 class="timeline-header"><a href="#">{{ Auth::user()->name }} {{ Auth::user()->surname }}</a> {{ Auth::user()->designation->name }}</h3>
                                            <div class="timeline-body">
                                                {{ $notes->notes }}
                                            </div>
                                            <div class="timeline-body">
                                                {{ $notes->complaints }}
                                            </div>
                                            <div class="timeline-body">
                                                {{ $notes->observations }}
                                            </div>
                                            {{--<div class="timeline-footer">
                                                <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                                <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                            </div>--}}
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="timeline">
                                <div class="timeline timeline-inverse">
                                    <div class="time-label">
                                        <span class="">
                                            Attending Dr / Ns Notes
                                        </span>
                                    </div>
                                    @foreach($episode->notes as $note)
                                    <div>
                                        <i class="fas fa-edit bg-secondary"></i>
                                        <div class="timeline-item">
                                            <span class="time"><i class="far fa-clock"></i>{{ $notes->created_at }}</span>
                                            <h3 class="timeline-header"><a href="#">{{ Auth::user()->name }} {{ Auth::user()->surname }}</a> {{ Auth::user()->designation->name }}</h3>
                                            <div class="timeline-body">
                                                {{ $note->comment }}
                                            </div>
                                            
                                            {{--<div class="timeline-footer">
                                                <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                                <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                            </div>--}}
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
<div class="modal lg fade" id="add-item-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add item</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="add-item-form" method="post" action="{{ route('episode.create-item', $episode) }}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">Item</label>
                                <select name="item_id" class="form-control js-example-basic-single form-control multiple" style="padding: 6px 12px !important; width: 100% !important">
                                    @foreach($items as $index => $value)
                                    <option value="{{ $value->id }}" selected="selected">{{ $value->item_code }} - {{ $value->item_description }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">Quantity</label>
                                <input name="quantity" class="form-control multiple" style="padding: 6px 12px !important; width: 100% !important" />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <div class="form-group pull-right">
                    <button onclick="$('#add-item-form').submit()" class="btn btn-secondary float-right mr-2">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal lg fade" id="add-vital-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Episode number</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form id="episode-vital-form" method="post" action="{{ route('episode.create-vital', $episode) }}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">Vital</label>
                                <select name="vital_name" class="form-control js-example-basic-single form-control multiple" style="padding: 6px 12px !important; width: 100% !important">
                                    @foreach($vitalGroups as $index => $value)
                                    <option value="{{ $value->name }}" selected="selected">{{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">Value</label>
                                <input name="vital_value" class="form-control" style="padding: 6px 12px !important; width: 100% !important" />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <div class="form-group pull-right">
                    <button onclick="$('#episode-vital-form').submit()" class="btn btn-secondary float-right mr-2">Update Details</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal lg fade" id="add-note-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Note</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="add_note_form" method="post" action="{{ route('episode.create-note', $episode) }}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">Note</label>
                                <textarea name="comment" class="form-control multiple" style="padding: 6px 12px !important; width: 100% !important"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <div class="form-group pull-right">
                    <button onclick="$('#add_note_form').submit()" class="btn btn-secondary float-right mr-2">submit</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal lg fade" id="add-payment-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ $episode->episode_code }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="episode-payment-form" method="post" action="{{ route('episode.create-payment', $episode) }}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">Amount</label>
                                <input name="amount" class="form-control" style="padding: 6px 12px !important; width: 100% !important" />
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">Date of payment</label>
                                <input type="date" name="date" class="form-control" style="padding: 6px 12px !important; width: 100% !important" />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <div class="form-group pull-right">
                    <button onclick="$('#episode-payment-form').submit()" class="btn btn-secondary float-right mr-2">Update Details</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection