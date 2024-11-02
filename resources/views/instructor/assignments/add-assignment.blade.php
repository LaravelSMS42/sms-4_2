@extends('inst-layout')
@section('title', 'Add Assignment')
@section('content')
    <div class="card">
        <div class="card-header text-center">
            <h5 class="card-title">Add Assignment</h5>
        </div>
        <form action="{{ route('assignments.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group row mb-3">
                    <label for="title" class="col-sm-2 col-form-label">Title:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="title" name="title" placeholder="e.g Assignment 1">
                        @error("title") <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="instructions" class="col-sm-2 col-form-label">Instructions:</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="instructions" name="instructions" placeholder="e.g Write on a word file..." rows='3'></textarea>
                        @error("instructions") <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="points" class="col-sm-2 col-form-label">Points:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="points" name="points" placeholder="e.g 100">
                        @error('points') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-group col d-flex h-25">
                    <div class="d-flex m-2 flex-fill">
                        <label for="deadline_date" class="col-sm-2 col-form-label flex-fill">Deadline:</label>
                        <input type="datetime-local" id="deadline_date" name="deadline_date">
                        @error('deadline_date') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="d-flex m-2 flex-fill">
                        <label for="available_date" class="col-sm-2 col-form-label flex-fill">Availability Date:</label>
                        <input type="datetime-local" id="available_date" name="available_date">
                        @error('available_date') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="d-flex m-2 flex-fill">
                        <label class="form-check-label flex-fill" for="allow_attachments">Allow Attachments:</label>
                        <input class="form-check-input" type="checkbox" id="allow_attachments" name="allow_attachments">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-end bd-highlight gap-2">
                    <button type="submit" class="btn btn-success" value="Add">Add</button>
                    <a href="{{ route('assignments.index') }}" class="btn btn-danger">Cancel</a>
                </div>
            </div>
        </form>
    </div>
@endsection