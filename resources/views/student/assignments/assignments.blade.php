@extends('student-layout')
@section('title', 'Assignments')
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
<a href="/student/course/menu" class="d-flex flex-start mb-2"><- Back to Course Menu</a>

<div class="card">
  <div class="card-header text-center">
    <h5 class="card-title">Assignments</h5>
  </div>
  <div class="card-body">
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Assignment</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @forelse($assignments as $item)
            <tr>
                <td><a href="{{ route('assignments.show', $item->id) }}">{{ $item->title }}</a></td>
            </tr>
            @empty
            <tr>
                <th>There are no assignments</th>
            </tr>
            @endforelse
        </tbody>
    </table>
  </div>
</div>
@endsection