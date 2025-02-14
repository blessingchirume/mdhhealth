@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card m-3">
            <div class="card-header">
                <h2 class="card-title">Theatre Rooms</h2>
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addTheatreRoomModal">Add Theatre Room</button>
            </div>
            <div class="card-body">
                <table class="table  nowrap align-middle">
                    <thead>
                        <tr>
                            <th>Room Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rooms as $room) 
                            <tr>
                                <td>{{ $room->room ?? 'Unknown Room' }}</td>
                                <td>{{ $room->status ?? 'No Details' }}</td>
                                <td>
                                    {{$room->comment}}
                                    <!--a><i class="fa fa-calander"></i>Bookings</!--a-->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Theatre Room Modal -->
    <div class="modal fade" id="addTheatreRoomModal" tabindex="-1" role="dialog" aria-labelledby="addTheatreRoomModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTheatreRoomModalLabel">Add Theatre Room</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('store.theatre.room') }}">
                        @csrf
                        <div class="form-group">
                            <label for="room_name">Room Name</label>
                            <input type="text" class="form-control" id="room_name" name="room" required>
                        </div>
                        
                            <input type="hidden" class="form-control" id="status" name="status" value='Available'>
                        <div class="form-group">
                            <label for="comment">Comment</label>
                            <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Room</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
