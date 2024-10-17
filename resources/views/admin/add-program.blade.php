@extends('layout')
@section('title', 'Add Program')
@section('content')
<div class="card">
    <div class="card-header text-center">
        <h5 class="card-title">Add Program</h5>
    </div>
    <form>
        <div class="card-body">
            <div class="form-group row mb-3">
                <label for="programName" class="col-sm-2 col-form-label">Program Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="programName" placeholder="e.g Bachelor of Science in Information Technology">
                </div>
            </div>
            <div class="form-group row mb-3">
                <label for="programCode" class="col-sm-2 col-form-label">Program Code:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="programCode" placeholder="e.g BSIT">
                </div>
            </div>
            <div class="form-group row mb-3">
                <label for="college" class="col-sm-2 col-form-label">College:</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="selectCollege">
                        <option value="1">CECT</option>
                        <option value="2">CBA</option>
                        <option value="3">CAS</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="department" class="col-sm-2 col-form-label">department:</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="selectDepartment">
                        <option value="1">Information Technology Department</option>
                        <option value="2">Engineering Department</option>
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