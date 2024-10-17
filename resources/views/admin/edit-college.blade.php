@extends('layout')
@section('title', 'Edit {College}')
@section('content')
<div class="card">
    <div class="card-header text-center">
        <h5 class="card-title">Edit {College}</h5>
    </div>
    <form>
        <div class="card-body">
            <div class="form-group row mb-3">
                <label for="collegeName" class="col-sm-2 col-form-label">College Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="collegeName" placeholder="e.g College of Business and Accountancy">
                </div>
            </div>
            <div class="form-group row mb-3">
                <label for="collegeAcronym" class="col-sm-2 col-form-label">College Acronym:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="collegeAcronym" placeholder="e.g CBA">
                </div>
            </div>
            <div class="form-group row">
                <label for="collegeAcronym" class="col-sm-2 col-form-label">Dean/Person-In-Charge:</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="selectPIC">
                        <option value="1">Engr. Ryan John De Lara</option>
                        <option value="2">Dr. Willie Reyes</option>
                        <option value="3">Dr. Marietta Agustin</option>
                    </select>
                </div>
                
            </div>
        </div>
        
        <div class="card-footer d-flex justify-content-between">
            <div class="bd-highlight gap-2">
                <button type="button" class="btn btn-primary">Departments</button>
                <button type="button" class="btn btn-primary">Programs</button>
            </div>
            <div class="bd-highlight gap-2">
                <button type="button" class="btn btn-success">Save</button>
                <button type="button" class="btn btn-danger">Cancel</button>
            </div>
        </div>
    </form>
</div>
@endsection