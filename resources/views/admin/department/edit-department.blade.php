@extends('layout')
@section('title', 'Edit Department')
@section('content')
<div class="card">
    <div class="card-header text-center">
        <h5 class="card-title">Edit {{ $department->department_name }}</h5>
    </div>
    <form action="{{ route('departments.update', $department->id) }}" method="POST">
        @csrf
        {{ method_field('PUT') }}
        <div class="card-body">
            <div class="form-group row mb-3">
                <label for="departmentPIC" class="col-sm-2 col-form-label">College:</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="college_id" id="college_id" name="college_id">
                        @foreach($colleges as $item)
                            <option value="{{ $item->id }}" {{ ( $item->id == $existingCollegeId) ? 'selected' : '' }}>{{ $item->college_name }}</option>
                        @endforeach
                    </select>
                    @error('college_id') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="form-group row mb-3">
                <label for="department_name" class="col-sm-2 col-form-label">Department Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="department_name" id="department_name" value="{{ $department->department_name }}">
                    @error('department_name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="form-group row mb-3">
                <label for="departmnet_email" class="col-sm-2 col-form-label">Department Email:</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="department_email" name="department_email" value="{{ $department->department_email }}">
                    @error('department_email') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Building:</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="building_id" id="building-id" name="building_id">
                        @foreach($buildings as $item)
                            <option value="{{ $item->building_id }}" {{ ( $item->building_id == $existingBuildingId) ? 'selected' : '' }}>{{ $item->building_name }}</option>
                        @endforeach
                    </select>
                    @error('building_id') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <div class="d-flex justify-content-start bd-highlight gap-2">
                    <a href="{{ route('department-programs', $department->id) }}" class="btn btn-primary">Programs</a>
                </div>
            <div class="d-flex justify-content-end bd-highlight gap-2">
                <button type="submit" class="btn btn-success" value="Add">Save</button>
                <a href="{{ route('department.index') }}" class="btn btn-danger">Cancel</a>
            </div>
        </div>
    </form>
</div>
@endsection