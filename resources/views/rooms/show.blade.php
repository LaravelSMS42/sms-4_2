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

                    <div class="form-group">
                        <label for="room_number-{{ $room->id }}">Room Number</label>
                        <input type="text" class="form-control" id="room_number-{{ $room->id }}" name="room_number" value="{{ $room->room_number }}" required>
                    </div>

                    <div class="form-group">
                        <label for="building_number-{{ $room->id }}">Building Number</label>
                        <input type="text" class="form-control" id="building_number-{{ $room->id }}" name="building_number" value="{{ $room->building_number }}" required>
                    </div>

                    <div class="form-group">
                        <label for="department-{{ $room->id }}">Department</label>
                        <select class="form-control" id="department-{{ $room->id }}" name="department" required>
                            <option value="" disabled>Select Department</option>
                            <option value="CAS" {{ $room->department == 'CAS' ? 'selected' : '' }}>CAS (College of Arts and Sciences)</option>
                            <option value="CBA" {{ $room->department == 'CBA' ? 'selected' : '' }}>CBA (College of Business and Accountancy)</option>
                            <option value="CCJE" {{ $room->department == 'CCJE' ? 'selected' : '' }}>CCJE (Criminal Justice Education)</option>
                            <option value="COED" {{ $room->department == 'COED' ? 'selected' : '' }}>COED (College of Education)</option>
                            <option value="CAMS" {{ $room->department == 'CAMS' ? 'selected' : '' }}>CAMS (College of Allied Medical Sciences)</option>
                            <option value="COM" {{ $room->department == 'COM' ? 'selected' : '' }}>COM (College of Medicine)</option>
                            <option value="COL" {{ $room->department == 'COL' ? 'selected' : '' }}>COL (College of Law)</option>
                            <option value="CECT" {{ $room->department == 'CECT' ? 'selected' : '' }}>CECT (College of Engineering and Computer Studies)</option>
                            <option value="CHTM" {{ $room->department == 'CHTM' ? 'selected' : '' }}>CHTM (College of Hospitality and Tourism Management)</option>
                            <option value="CON" {{ $room->department == 'CON' ? 'selected' : '' }}>CON (College of Nursing)</option>
                            <option value="MAN" {{ $room->department == 'MAN' ? 'selected' : '' }}>MAN (MA in Nursing)</option>
                            <option value="SOLAS" {{ $room->department == 'SOLAS' ? 'selected' : '' }}>SOLAS (School of Leadership and Advanced Studies)</option>
                            <option value="CWSM" {{ $room->department == 'CWSM' ? 'selected' : '' }}>CWSM (Charles Wesley School of Music)</option>
                            <option value="WDS" {{ $room->department == 'WDS' ? 'selected' : '' }}>WDS (Wesley Divinity School)</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="professor-{{ $room->id }}">Professor</label>
                        <select class="form-control" id="professor-{{ $room->id }}" name="professor" required>
                            <option value="" disabled selected>Select Professor</option>
                            @foreach($professors as $professor)
                                <option value="{{ $professor->name }}" {{ $professor->name == $room->professor ? 'selected' : '' }}>{{ $professor->name }}</option>
                            @endforeach
                        </select>
                    </div>

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
