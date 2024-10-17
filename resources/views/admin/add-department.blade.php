@extends('layout')
@section('title', 'Add Department')
@section('content')
<div class="card">
    <div class="card-header text-center">
        <h5 class="card-title">Add Department</h5>
    </div>
    <form>
        <div class="card-body">
            <div class="form-group row mb-3">
                <label for="departmentName" class="col-sm-2 col-form-label">Department Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="departmentName" placeholder="e.g Information Technology Department">
                </div>
            </div>
            <div class="form-group row mb-3">
                <label for="departmentPIC" class="col-sm-2 col-form-label">Department Head:</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="selectPIC">
                        <option value="1">Engr. Ryan John De Lara</option>
                        <option value="2">Dr. Willie Reyes</option>
                        <option value="3">Dr. Marietta Agustin</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="building" class="col-sm-2 col-form-label">Building:</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="selectBuilding">
                        <option value="1">Computer Science Building</option>
                        <option value="2">Main Library Building</option>
                        <option value="3">Administration Building</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="d-flex justify-content-end bd-highlight gap-2">
                <button type="button" class="btn btn-success">Add</button>
                <button type="button" class="btn btn-danger">Cancel</button>
            </div>
        </div>
    </form>
</div>
@endsection