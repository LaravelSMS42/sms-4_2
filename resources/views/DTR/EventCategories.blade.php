@extends('layout')
@section('title', 'Event Categories')

@section('content')
    <div class="container">
        <div class="row my-4">
            <!-- Event Categories -->
            <div class="col-md-4">
                <h5>Event Categories</h5>
            </div>

            <!-- Dropdown -->
            <div class="col-md-2">
                <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle w-100 text-start" type="button" id="dropdownEventCategories" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                    </button>
                    <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="#">Option 1</a></li>
                        <li><a class="dropdown-item" href="#">Option 2</a></li>
                        <li><a class="dropdown-item" href="#">Option 3</a></li>
                    </ul>
                </div>
            </div>

            <!-- Searchbar -->
            <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Search for events...">
            </div>
        </div>

        <!-- Academic Events Section -->
        <div class="row my-4">
            <div class="col-12">
                <h5>Academic Events</h5>
            </div>

            <!-- Event Cards -->
            <div class="col-md-4 my-2">
                <div class="card">
                    <div class="card-body bg-light text-center">
                        Event Name
                    </div>
                </div>
            </div>
            <div class="col-md-4 my-2">
                <div class="card">
                    <div class="card-body bg-light text-center">
                        Event Name
                    </div>
                </div>
            </div>
            <div class="col-md-4 my-2">
                <div class="card">
                    <div class="card-body bg-light text-center">
                        Event Name
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
