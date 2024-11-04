@extends('inst-layout')
@section('title', 'Edit Question')
@section('content')
    <div class="card">
        <div class="card-header text-center">
            <h5 class="card-title">Edit Question</h5>
        </div>
        <form action="{{ route('questions.update', $question->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group row mb-3">
                    <label for="title" class="col-sm-2 col-form-label">Question:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="question" name="question" value="{{ $question->question }}">
                        @error("question") <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="answer" class="col-sm-2 col-form-label">Answer:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="answer" name="answer" value="{{ $question->answer }}">
                        @error("answer") <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="points" class="col-sm-2 col-form-label">Points:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="points" name="points" value="{{ $question->points }}">
                        @error('points') <span class="text-danger">{{ $message }}</span> @enderror
                        <input type="hidden" value="{{ $question->task_id }}" id="task_id" name="task_id">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="gap-2 d-flex justify-content-end">
                    <button type="submit" class="btn btn-success">Save</button>
                    <a href="{{ route('quiz-questions', $question->task_id) }}" class="btn btn-danger">Cancel</a>
                </div>
            </div>
        </form>
    </div>
@endsection