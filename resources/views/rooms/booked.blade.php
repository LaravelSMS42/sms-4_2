@extends('layout')

@section('content')
<div class="container">
    <h2>Booked Rooms</h2>

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

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Room Number</th>
                <th>Building Number</th>
                <th>Department</th>
                <th>Booked By</th>
                <th>Booking Date</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $booking)
                <tr>
                    <td>{{ $booking->id }}</td>
                    <td>{{ $booking->room->room_number }}</td>
                    <td>{{ $booking->room->building_number }}</td>
                    <td>{{ $booking->room->department }}</td>
                    <td>{{ $booking->booked_by }}</td>
                    <td>{{ \Carbon\Carbon::parse($booking->booking_date)->format('F d, Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($booking->start_time)->format('h:i A') }}</td>
                    <td>{{ \Carbon\Carbon::parse($booking->end_time)->format('h:i A') }}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton-{{ $booking->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton-{{ $booking->id }}">
                                <li>
                                    <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#updateBookingModal-{{ $booking->id }}">Update</button>
                                </li>
                                <li>
                                    <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this booking?');">Delete</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>

                <!-- Update Booking Modal -->
                <div class="modal fade" id="updateBookingModal-{{ $booking->id }}" tabindex="-1" role="dialog" aria-labelledby="updateBookingModalLabel-{{ $booking->id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="updateBookingModalLabel-{{ $booking->id }}">Update Booking</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('bookings.update', $booking->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="booking_date">Booking Date</label>
                                        <input type="date" class="form-control" name="booking_date" value="{{ $booking->booking_date }}" required>
                                    </div>
                                    <div class="form-group">
    <label for="start_time">Start Time</label>
    <input type="time" class="form-control" name="start_time" value="{{ \Carbon\Carbon::parse($booking->start_time)->format('H:i') }}" required>
</div>
<div class="form-group">
    <label for="end_time">End Time</label>
    <input type="time" class="form-control" name="end_time" value="{{ \Carbon\Carbon::parse($booking->end_time)->format('H:i') }}" required>
</div>

                                    <div class="form-group">
                                        <label for="booked_by">Booked By</label>
                                        <input type="text" class="form-control" name="booked_by" value="{{ $booking->booked_by }}" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update Booking</button>
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
