@extends('layout')
@section('title', 'Edit Program')
@section('content')
<div class="card">
    <div class="card-header text-center">
        <h5 class="card-title">Edit {{ $program->program_name }}</h5>
    </div>
    <form action="{{ route('programs.update', $program->id) }}" method="POST">
        @csrf
        {{ method_field('PUT') }}
        <div class="card-body">
            <div class="form-group row mb-3">
                <label for="college_id" class="col-sm-2 col-form-label">College:</label>
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
                <label for="department_id" class="col-sm-2 col-form-label">Department:</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="department_id" id="department_id" name="department_id">
                        @foreach($departments as $item)
                            <option value="{{ $item->id }}" {{ ( $item->id == $existingDepartmentId) ? 'selected' : '' }}>{{ $item->department_name }}</option>
                        @endforeach
                    </select>
                    @error('department_id') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="form-group row mb-3">
                <label for="program_name" class="col-sm-2 col-form-label">Program Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="program_name" id="program_name" value="{{ $program->program_name }}">
                    @error('program_name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="program_code" class="col-sm-2 col-form-label">Program Code:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="program_code" name="program_code" value="{{ $program->program_code }}">
                    @error('program_code') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="d-flex justify-content-end bd-highlight gap-2">
                <button type="submit" class="btn btn-success" value="Save">Save</button>
                <a href="{{ route('program.index') }}" class="btn btn-danger">Cancel</a>
            </div>
        </div>
    </form>
</div>
@endsection