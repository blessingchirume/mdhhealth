@extends('layouts.app')

@section('content')

<form method="post" action="{{ route('scan.store') }}" id="scan-form">
    @csrf
    <div class="card card-primary m-3">
        <div class="card-header">
            <h3 class="card-title">Add Scan/Tests</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <label for="name">Test / Scan Name</label>
                    <input type="text" class="form-control" name="name" />
                </div>
                
                <div class="col-md-6">
                    <label for="name">Unit Price</label>
                    <input type="text" class="form-control" name="unit_price" />
                </div>
                <div class="col-md-6">
                    <label for="name">Base Price</label>
                    <input type="text" class="form-control" name="base_price" />
                </div>
                <div class="col-md-6">
                    <label for="name">Tariff Code</label>
                    <input type="text" class="form-control" name="tariff_code" />
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection
