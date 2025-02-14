@extends('layouts.app')

@section('content')
    <div class="card m-3">
        <div class="card-body">
            <h1>Patients List<div class="float-right"><a href="{{route('radiology.bookings')}}" class="btn btn-primary">Radiology Bookings</a></div></h1>
            <p class="info">Click on the "Book Scan" button to book patient For Radiology</p>
            <table class="table  nowrap align-middle data-table">
                <thead>
                    <tr>
                        <th>EpisodeCode</th>
                        <th>patient Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($episodes as $episode)
                    <?php if ($episode->radiology->isNotEmpty()):
                            continue;
                        endif;
                        ?>
                        <tr>
                            <td>{{ $episode->episode_code }}</td>
                            <td>{{ $episode->patient->name.' '.$episode->patient->surname }}</td>
                            <td>
                                @if($episode->labTests->isEmpty())
                                <a href="{{ route('scan-booking', $episode->id) }}">Book Scan</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
