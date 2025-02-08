@extends('layouts.app')

@section('content')
    <div class="card m-3">
        <div class="card-body">
            <h1>Laboratory Tests List<div class="float-right"><a href="{{ route('laboratory.index') }}" class="btn btn-primary ">Back</a></div></h1>
            <table class="table table-bordered table-striped data-table">
                <thead>
                    <tr>
                        <th>EpisodeCode</th>
                        <th>patient Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $booking)
                        <?php if ($booking->tests->isEmpty()):
                            continue;
                        endif;
                        ?>
                        <tr>
                            <td>{{ $booking->episode->episode_code }}</td>
                            <td>{{ $booking->episode->patient->name . ' ' . $booking->episode->patient->surname }}</td>
                            <td>

                                    @if ($booking->status ==='Pending' || $booking->status === 'In-Progress')
                                        <a href="{{ route('upload-test-results', $booking->id) }}">Upload Results</a>
                                    @else
                                        <a href="{{ route('view-results', $booking->id) }}">View Results</a>
                                    @endif

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
