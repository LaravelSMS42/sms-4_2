@extends('inst-layout')
@section('title', 'Exams')
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
<a href="/instructor/course/menu" class="d-flex flex-start mb-2"><- Back to Course Menu</a>

<div class="card">
  <div class="card-header text-center">
    <h5 class="card-title">Exams</h5>
  </div>
  <div class="card-body">
    <div class="d-flex bd-highlight mb-3 justify-content-between">
        <div class="d-flex">
            <a href="{{ route('archived-exams') }}" class="ms-auto d-flex bd-highlight btn btn-primary">Archives</a>
        </div>
        <div class="d-flex">
            <a href="{{ route('exams.create') }}" class="ms-auto d-flex bd-highlight btn btn-success">Add Exam</a>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Exam</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @forelse($exams as $item)
            <tr>
                <th>{{ $item->id }}</th>
                <td colspan="2">{{ $item->title }}</td>
                <td class="d-flex justify-content-end">
                    <a class="btn btn-outline-primary me-2" href="{{ route('exams.edit', $item->id) }}">Edit</a>
                    <a class="btn btn-outline-primary me-2" href="">Submissions</a>
                    <form action="{{ route('exams.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to archive this exam? You may unarchive this in the archived exams page.')">
                    @csrf
                    {{ method_field('DELETE') }}

                        <button type="submit" class="btn btn-danger">Archive</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <th>There are no exams</th>
            </tr>
            @endforelse
        </tbody>
    </table>
  </div>
</div>
@endsection