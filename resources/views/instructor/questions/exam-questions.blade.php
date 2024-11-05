@extends('inst-layout')
@section('title', 'Exam Questions Management')
@section('content')
<!-- @session('status')
<div class="alert alert-success">
    {{ session()->get('status') }}
</div>
@endsession -->
@if (session()->has('status')) 
<div class="alert alert-success">
    {{ (session()->get('status')) }}
</div> 
@endif
<a href="{{ route('exams.edit', $exam->id) }}"><- Back</a>
<div class="card">
  <div class="card-header text-center">
    <h5 class="card-title">Exam Questions Management</h5>
  </div>
  <div class="card-body">
    <div class="d-flex bd-highlight mb-3">
        <form class="d-flex" role="search">
            <input class="form-control me-2" style="" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <a href="{{ route('add-exam-question', $exam->id) }}" class="ms-auto d-flex bd-highlight btn btn-success">Add Question</a>
    </div>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Question</th>
            <th scope="col">Answer</th>
            <th scope="col">Points</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @forelse($examQuestions as $item)
            <tr>
                <th>{{ $item->id }}</th>
                <td>{{ $item->question }}</td>
                <td>{{ $item->answer }}</td>
                <td>{{ $item->points }}</td>
                <td class="d-flex justify-content-end">
                    <a class="btn btn-outline-primary me-2" href="{{ route('exam-question.edit', $item->id) }}">Edit</a>
                    <form action="{{ route('exam-questions.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this question?')">
                    @csrf
                    {{ method_field('DELETE') }}

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <th>There are no questions</th>
            </tr>
            @endforelse
        </tbody>
    </table>
  </div>
</div>
@endsection