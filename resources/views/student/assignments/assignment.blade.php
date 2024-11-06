@extends('student-layout')
@section('title', '{{ $assignment->title }}')
@section('content')
    @if (session()->has('status')) 
    <div class="alert alert-success">
        {{ (session()->get('status')) }}
    </div> 
    @endif
    <a href="{{ route('student-assignment') }}" class="d-flex flex-start mb-2"><- Back</a>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">{{ $assignment->title }}</h5>
            <p class="card-text">Points: ?/{{ $assignment->points }}</p>
            <p class="card-text">Due: {{ date('l, F d Y\, H:i a', strtotime($assignment->deadline_date)) }}</p>
            <p class="card-text">Deadline: {{ date('l, F d Y\, H:i a', strtotime($assignment->available_date)) }}</p>
        </div>
        <div class="card-body">
            <p class="card-text" id="instructions" name="instructions">{{ $assignment->instructions }}</p>
            @if(date('Y-m-d H:i:s') > $assignment->available_date)
            <a href="" class="btn btn-success disabled" aria-disabled="true">Start Assignment</a>
            <p class="card-text text-danger">The deadline has passed. This assignment is now locked.</p>
            @else
            <a href="{{ route('create-assignment', $assignment->id) }}" class="btn btn-success">Start Assignment</a>
            @endif
        </div>
    </div>
@endsection