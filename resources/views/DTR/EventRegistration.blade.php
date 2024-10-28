@extends('layout')
@section('title', 'Event Registration')

@section('content')
    <div class="container">
        <div class="row my-4">
            <!-- Event Details Section -->
            <div class="col-md-6">
                <h5>Event Details</h5>
                <ul class="list-unstyled">
                    <li><strong>Event Name:</strong> Event Name Placeholder</li>
                    <li><strong>Event Date & Time:</strong> Date and Time Placeholder</li>
                    <li><strong>Venue:</strong> Venue Placeholder</li>
                </ul>

                <!-- Event Description Box -->
                <div class="border p-3" style="height: 150px;">
                    <p>Event Description Placeholder</p>
                </div>
            </div>

            <!-- Registration Details Section -->
            <div class="col-md-6">
                <h5>Registration Details Section</h5>

                <!-- Attendee Name -->
                <div class="mb-3">
                    <label for="attendeeName" class="form-label">Attendee Name</label>
                    <input type="text" class="form-control" id="attendeeName" placeholder="Text Input">
                </div>

                <!-- Email Address -->
                <div class="mb-3">
                    <label for="emailAddress" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="emailAddress" placeholder="Text Input">
                </div>

                <!-- Phone Number -->
                <div class="mb-3">
                    <label for="phoneNumber" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="phoneNumber" placeholder="Text Input">
                </div>

                <!-- Role Dropdown -->
                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select class="form-select" id="role">
                        <option selected>Select Role</option>
                        <option value="1">Role 1</option>
                        <option value="2">Role 2</option>
                        <option value="3">Role 3</option>
                    </select>
                </div>

                <!-- Confirm Button -->
                <button class="btn btn-secondary w-100" type="submit">Confirm</button>
            </div>
        </div>
    </div>
@endsection
