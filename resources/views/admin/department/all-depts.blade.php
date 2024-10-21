@extends('layout')
@section('title', 'Departments Management')
@section('content')
<div class="card">
  <div class="card-header text-center">
    <h5 class="card-title">Institution Departments</h5>
  </div>
  <div class="card-body">
    <div class="d-flex bd-highlight mb-3">
        <form class="d-flex" role="search">
            <input class="form-control me-2" style="" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <a href="{{ route('department.create') }}" class="ms-auto d-flex bd-highlight btn btn-success">Add Department</a>
    </div>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Department</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @forelse($departments as $item)
            <tr>
                <th>{{ $item->id }}</th>
                <td colspan="2">{{ $item->department_name }}</td>
                <td class="d-flex justify-content-end">
                    <a class="btn btn-outline-primary me-2" href="{{ route('department.edit', $item->id) }}">Edit</a>
                    <form action="{{ route('department.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to archive this Department? You may unarchive this in the archived colleges page.')">
                    @csrf
                    {{ method_field('DELETE') }}

                        <button type="submit" class="btn btn-danger">Archive</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <th>There are no departments</th>
            </tr>
            @endforelse
        </tbody>
    </table>
  </div>
</div>
@endsection