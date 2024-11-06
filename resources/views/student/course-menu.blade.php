@extends('inst-layout')
@section('title', 'Course Management')
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
<div class="card">
  <div class="card-header text-center">
    <h5 class="card-title">Course Management</h5>
  </div>
  <div class="card-body">
    <table class="table">
        <tbody class="table-group-divider">
            <tr>
                <td><a href='#'>Class List</a></td>
            </tr>
            <tr>
                <td><a href="{{ route('student-assignment') }}">Assignments</a></td>
            </tr>
            <tr>
                <td><a href="{{ route('quizzes.index') }}">Quizzes</a></td>
            </tr>
            <tr>
                <td><a href="{{ route('exams.index') }}">Exams</a></td>
            </tr>
            <tr>
                <td><a href="#">Grades</a></td>
            </tr>
        </tbody>
    </table>
  </div>
</div>
@endsection