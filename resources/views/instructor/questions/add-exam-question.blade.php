@extends('inst-layout')
@section('title', 'Add Question')
@section('content')
    <div class="card">
        <div class="card-header text-center">
            <h5 class="card-title">Add Question</h5>
        </div>
        <form action="{{ route('exam-questions.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group row mb-3">
                    <label for="question" class="col-sm-2 col-form-label">Question:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="question" name="question">
                        @error('question') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="answer" class="col-sm-2 col-form-label">Answer:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="answer" name="answer">
                        @error('answer') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="answer" class="col-sm-2 col-form-label">Points:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="points" name="points">
                        @error('points') <span class="text-danger">{{ $message }}</span> @enderror
                        <input type="hidden" value="{{ $exam->id }}" id="task_id" name="task_id">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-end bd-highlight gap-2">
                    <button type="submit" class="btn btn-success" value="Add">Add</button>
                    <a href="{{ route('exam-questions', $exam->id) }}" class="btn btn-danger">Cancel</a>
                </div>
            </div>
        </form>
    </div>
@endsection