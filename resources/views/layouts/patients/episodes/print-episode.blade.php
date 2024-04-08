@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Patient Episode Details</h1>
        <table class="table table-borderless">
            <tr>
                <th width="20%">Patient Name:</th>
                <td>{{ $episode->patient->name }} {{ $episode->patient->surname }}</td>
            </tr>
            <tr>
                <th>Episode Code:</th>
                <td>{{ $episode->episode_code }}</td>
            </tr>
            <tr>
                <th>Date:</th>
                <td>{{ $episode->date }}</td>
            </tr>
            <tr>
                <th>Purpose of Visit:</th>
                <td>{{ $episode->visit_purpose }}</td>
            </tr>
        </table>

        <table class="table table-striped table-bordered mt-5">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Payment Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="3">Consultation Fee</td>
                    <td>Paid</td>
                </tr>

                    @foreach ($chargeSheetItems as $item)
                    @if (isset($item->item))
                        <tr>
                            <td>{{ $item->item->item_description }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ number_format($item->item->base_price, 2) }}</td>
                            <td>{{ $item->status }}</td>
                        </tr>
                        @endif
                    @endforeach

            </tbody>
        </table>
    </div>
@endsection
