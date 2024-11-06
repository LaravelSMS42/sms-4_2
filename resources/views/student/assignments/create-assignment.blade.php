@extends('student-layout')
@section('title', '{{ $assignment->title }}')
@section('content')
    <a href="{{ route('assignments.show', $assignment->id) }}" class="d-flex flex-start mb-2"><- Back</a>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">{{ $assignment->title }}</h5>
            <p class="card-text">Points: ?/{{ $assignment->points }}</p>
            <p class="card-text">Due: {{ date('l, F d Y\, H:i a', strtotime($assignment->deadline_date)) }}</p>
            <p class="card-text">Deadline: {{ date('l, F d Y\, H:i a', strtotime($assignment->available_date)) }}</p>
        </div>
        <form action="{{ route('assignmentsubmissions.store') }}" method="POST" enctype="multipart/form-data">
        <div class="card-body">
            <p class="card-text" id="instructions" name="instructions">{{ $assignment->instructions }}</p>
            <textarea class="form-control mb-5" id="answer" name="answer" placeholder="Write your answer here..." rows='3'></textarea>
            <input type="file" class="form-control-file" id="attachment" name="attachment">
            <input type="hidden" id="task_id" name="task_id" value="{{ $assignment->id }}">
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success" value="Submit">Submit</button>
        </div>
        </form>
    </div>
@endsection