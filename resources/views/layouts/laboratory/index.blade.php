@extends('layouts.app')

@section('content')
    <div class="card m-3">
        <div class="card-body">
            <h1>Patients List<div class="float-right"><a href="{{route('laboratory.bookings')}}" class="btn btn-primary">Lab Bookings</a></div></h1>
            <p class="info">Click on the "Book Test" button to book a test</p>
            <table class="table table-bordered table-striped data-table">
                <thead>
                    <tr>
                        <th>EpisodeCode</th>
                        <th>Patient Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($episodes as $episode)
                    <?php if ($episode->labTests->isNotEmpty()):
                            continue;
                        endif;
                        ?>
                        <tr>
                            <td>{{ $episode->episode_code }}</td>
                            <td>{{ $episode->patient->name.' '.$episode->patient->surname }}</td>
                            <td>
                                @if($episode->labTests->isEmpty())
                                <a href="{{ route('test-booking', $episode->id) }}">Book Test</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
