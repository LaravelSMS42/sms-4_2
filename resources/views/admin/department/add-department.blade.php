@extends('layout')
@section('title', 'Add Department')
@section('content')
<div class="card">
    <div class="card-header text-center">
        <h5 class="card-title">Add Department</h5>
    </div>
    <form action="{{ route('departments.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group row mb-3">
                <label for="college_id" class="col-sm-2 col-form-label">College:</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="college_id" id="college_id" name="college_id">
                        @foreach($colleges as $item)
                            <option value="{{ $item->id }}">{{ $item->college_name }}</option>
                        @endforeach
                    </select>
                    @error('college_id') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="form-group row mb-3">
                <label for="departmentName" class="col-sm-2 col-form-label">Department Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="department_name" id="department_name" placeholder="e.g Information Technology Department">
                    @error('college_id') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="form-group row mb-3">
                <label for="departmnet_email" class="col-sm-2 col-form-label">Department Email:</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="department_email" name="department_email" placeholder="e.g wupcba@gmail.com">
                    @error('department_email') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Building:</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="building_id" id="building-id" name="building_id">
                        @foreach($buildings as $item)
                            <option value="{{ $item->building_id }}">{{ $item->building_name }}</option>
                        @endforeach
                    </select>
                    @error('building_id') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="d-flex justify-content-end bd-highlight gap-2">
                <button type="submit" class="btn btn-success" value="Add">Add</button>
                <a href="{{ route('department.index') }}" class="btn btn-danger">Cancel</a>
            </div>
        </div>
    </form>
</div>
@endsection