@extends('layout')
@section('title', 'Add College')
@section('content')
    <div class="card">
        <div class="card-header text-center">
            <h5 class="card-title">Add College</h5>
        </div>
        <form action="{{ route('colleges.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group row mb-3">
                    <label for="collegeName" class="col-sm-2 col-form-label">College Name:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="college_name" name="college_name" placeholder="e.g College of Business and Accountancy">
                        @error('college_name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="collegeAcronym" class="col-sm-2 col-form-label">College Acronym:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="college_acronym" name="college_acronym" placeholder="e.g CBA">
                        @error('college_acronym') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="collegeEmail" class="col-sm-2 col-form-label">College Email:</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="college_email" name="college_email" placeholder="e.g wupcba@gmail.com">
                        @error('college_email') <span class="text-danger">{{ $message }}</span> @enderror
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
                    <a href="{{ route('college.index') }}" class="btn btn-danger">Cancel</a>
                </div>
            </div>
        </form>
    </div>
@endsection