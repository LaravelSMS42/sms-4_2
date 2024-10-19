@extends('layout')

@section('content')

    <div class="container">
        <h1>This is  personal information</h1>
        
        <div class="card">

            <div class="card-header">
              Your Personal Information
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="disabledTextInput" class="form-label">First Name</label>
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="First Name">
                    </div>
                    <div class="col mb-3">
                        <label for="disabledTextInput" class="form-label">Middle Name</label>
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Middle Name">
                    </div>
                    <div class="col mb-3">
                        <label for="disabledTextInput" class="form-label">Last Name</label>
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Last Name">
                    </div>
                </div>

                <div class="row">
                    <div class="col mb-3">
                        <label for="disabledTextInput" class="form-label">Date of Birth</label>
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Date-of-Biirth">
                    </div>
                    <div class="col mb-3">
                        <label for="disabledTextInput" class="form-label">Place of Birth</label>
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Place-of-Birth">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">Address</label>
                    <input type="text" id="disabledTextInput" class="form-control" placeholder="Address">
                </div>

                <h5>Contact Information</h5>
                <div class="row">
                    <div class="col mb-3">
                        <label for="disabledTextInput" class="form-label">Emergency Contact</label>
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Address">
                    </div>
                    <div class="col mb-3">
                        <label for="disabledTextInput" class="form-label">Email</label>
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="email@gmail.com">
                    </div>
                </div>

            <!-- Button trigger modal -->
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Edit
                </button>
            </div>
            
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        ...
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

            </div>

        </div> {{-- end card --}}

    </div> {{-- end container --}}

@endsection