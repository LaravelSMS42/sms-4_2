@extends('layout')
@section('title', 'Event Creation')

@section('content')
    <div class="container">
        <div class="row my-4">
            <!-- Event Name and Coordinator Section -->
            <div class="col-md-6">
                <h5>Event Details</h5>
                <form action="" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="eventName" class="form-label">Event Name</label>
                        <input type="text" class="form-control" name="eventName" id="eventName" placeholder="Text Input" required>
                    </div>
                    <div class="mb-3">
                        <label for="eventCoordinator" class="form-label">Event Coordinator</label>
                        <input type="text" class="form-control" name="eventCoordinator" id="eventCoordinator" placeholder="Text Input" required>
                    </div>
                    <div class="mb-3">
                        <label for="eventDescription" class="form-label">Event Description</label>
                        <textarea class="form-control" name="eventDescription" id="eventDescription" rows="4" placeholder="Text Box"></textarea>
                    </div>
            </div>

            <!-- Event Type and Date/Time Section -->
            <div class="col-md-6">
                    <div class="mb-3">
                        <label for="eventType" class="form-label">Event Type</label>
                        <select class="form-select" name="eventType" id="eventType" required>
                            <option selected>Dropdown</option>
                            <option value="1">Type 1</option>
                            <option value="2">Type 2</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="startDate" class="form-label">Start Date & Time</label>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="date" class="form-control" name="startDate" id="startDate" required>
                            </div>
                            <div class="col-md-6">
                                <input type="time" class="form-control" name="startTime" id="startTime" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="endDate" class="form-label">End Date & Time</label>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="date" class="form-control" name="endDate" id="endDate" required>
                            </div>
                            <div class="col-md-6">
                                <input type="time" class="form-control" name="endTime" id="endTime" required>
                            </div>
                        </div>
                    </div>

                    <!-- Navigation Buttons -->
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-secondary">Back Button</button>
                        <button type="submit" class="btn btn-primary">Next Button</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
