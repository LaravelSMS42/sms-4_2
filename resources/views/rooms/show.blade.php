@extends('layout')

@section('content')
<div class="container">
    <h2>Rooms List</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Room Number</th>
                <th>Building Number</th>
                <th>Department</th>
                <th>Professor</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rooms as $room)
                <tr>
                    <td>{{ $room->id }}</td>
                    <td>{{ $room->room_number }}</td>
                    <td>{{ $room->building_number }}</td>
                    <td>{{ $room->department }}</td>
                    <td>{{ $room->professor }}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton-{{ $room->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton-{{ $room->id }}">
                                <li>
                                    <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editRoomModal-{{ $room->id }}">Edit</button>
                                </li>
                                <li>
                                    <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#bookRoomModal-{{ $room->id }}">Book Room</button>
                                </li>
                                <li>
                                    <form action="{{ route('rooms.remove', $room->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this room?');">Delete</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>

                <!-- Edit Room Modal -->
                <div class="modal fade" id="editRoomModal-{{ $room->id }}" tabindex="-1" role="dialog" aria-labelledby="editRoomModalLabel-{{ $room->id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editRoomModalLabel-{{ $room->id }}">Edit Room</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('rooms.update', $room->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <!-- Room fields here (room_number, building_number, etc.) -->
                                    <button type="submit" class="btn btn-primary">Update Room</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Book Room Modal -->
                <div class="modal fade" id="bookRoomModal-{{ $room->id }}" tabindex="-1" role="dialog" aria-labelledby="bookRoomModalLabel-{{ $room->id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="bookRoomModalLabel-{{ $room->id }}">Book Room</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('rooms.book', $room->id) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="booking_date">Booking Date</label>
                                        <input type="date" class="form-control" name="booking_date" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="start_time">Start Time</label>
                                        <input type="time" class="form-control" name="start_time" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="end_time">End Time</label>
                                        <input type="time" class="form-control" name="end_time" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="booked_by">Booked By</label>
                                        <input type="text" class="form-control" name="booked_by" value="{{ $room->professor }}" readonly required> <!-- Auto-fill with professor's name -->
                                    </div>
                                    <button type="submit" class="btn btn-primary">Confirm Booking</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach
        </tbody>
    </table>
</div>
@endsection
