@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('Currency') }}</h1>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <section class="content">
                    <div class="card">
                        <div class="card-header">
                            <div class="float-right btn-group btn-group-sm">
                                @can(App\Constants\PermisionConstants::createPatient)
                                <a href="{{ route('patient.create') }}" class="btn btn-primary">
                                    <i class="fa fa-plus"></i> Generate
                                </a>
                                @endcan
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="table1" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Group Name</th>
                                        @foreach($currencies as $index => $currency)
                                        <th>{{ $currency->name }}</th>
                                        @endforeach

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($groups as $value)
                                    <tr>
                                        <td>{{$value->name}}</td>
                                        @foreach($value->currencies as $currency)
                                        <td><a href="" class="editable" data-type="text" data-name="rate" data-pk="{{ $currency->pivot->id }}">{{ $currency->pivot->rate }}</a></td>
                                        @endforeach
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
@endsection
