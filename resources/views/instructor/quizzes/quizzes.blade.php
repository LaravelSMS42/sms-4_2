@extends('inst-layout')
@section('title', 'Quizzes')
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
    <h5 class="card-title">Quizzes</h5>
  </div>
  <div class="card-body">
    <div class="d-flex bd-highlight mb-3">
        <a href="" class="ms-auto d-flex bd-highlight btn btn-success">Add Quiz</a>
    </div>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Quiz</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <tr>
                <th>1</th>
                <td colspan="2">Quiz 1</td>
                <td class="d-flex justify-content-end">
                    <a class="btn btn-outline-primary me-2" href="">Edit</a>
                    <a class="btn btn-outline-primary me-2" href="">Submissions</a>
                    <form action="" method="POST" onsubmit="return confirm('Are you sure you want to archive this College? You may unarchive this in the archived colleges page.')">
                    @csrf
                    {{ method_field('DELETE') }}

                        <button type="submit" class="btn btn-danger">Archive</button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
  </div>
</div>
@endsection