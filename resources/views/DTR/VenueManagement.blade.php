@extends('layout')
@section('title', 'Venue Management')

@section('content')
    <div class="container">
        <div class="row my-4">
            <!-- Venue Details Section -->
            <div class="col-md-6">
                <h5>Venue Details</h5>
                <div class="mb-3">
                    <label for="venueName" class="form-label">Venue Name</label>
                    <input type="text" class="form-control" id="venueName" placeholder="Dropdown">
                </div>
                <div class="mb-3">
                    <label for="venueType" class="form-label">Venue Type</label>
                    <select class="form-select" id="venueType">
                        <option selected>Dropdown</option>
                        <option value="1">Type 1</option>
                        <option value="2">Type 2</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="locationDetails" class="form-label">Location Details</label>
                    <textarea class="form-control" id="locationDetails" rows="4" placeholder="Text Box"></textarea>
                </div>
            </div>

            <!-- Date and Maximum Capacity Section -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="startDateTime" class="form-label">Start Date & Time</label>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="date" class="form-control" id="startDateTime">
                        </div>
                        <div class="col-md-6">
                            <input type="time" class="form-control" id="startTime">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="endDateTime" class="form-label">End Date & Time</label>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="date" class="form-control" id="endDateTime">
                        </div>
                        <div class="col-md-6">
                            <input type="time" class="form-control" id="endTime">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="maxCapacity" class="form-label">Maximum Capacity</label>
                    <input type="number" class="form-control" id="maxCapacity" placeholder="Text Input">
                </div>

                <!-- Navigation Buttons -->
                <div class="d-flex justify-content-between">
                    <button class="btn btn-secondary">Back Button</button>
                    <button class="btn btn-primary">Next Button</button>
                </div>
            </div>
        </div>
    </div>
@endsection
