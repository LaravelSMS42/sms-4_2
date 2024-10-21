@extends('layout')
@section('title', 'Archived Departments')
@section('content')
<div class="card">
  <div class="card-header text-center">
    <h5 class="card-title">Archived Departments</h5>
  </div>
  <div class="card-body">
    <div class="d-flex bd-highlight mb-3">
        <form class="d-flex" role="search">
            <input class="form-control me-2" style="" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
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
                    <form action="{{ route('unarchive-dept', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to restore this Department? You may view this in the department management page.')">
                    @csrf
                    @method('PUT')

                        <button type="submit" class="btn btn-outline-success">Unarchive</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <th>There are no archived departments</th>
            </tr>
            @endforelse
        </tbody>
    </table>
  </div>
</div>
@endsection