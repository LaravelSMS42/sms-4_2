@extends('inst-layout')
@section('title', 'Archived Assignments')
@section('content')
<a href="/instructor/course/menu" class="d-flex flex-start mb-2"><- Back to Course Menu</a>

<div class="card">
  <div class="card-header text-center">
    <h5 class="card-title">Archived Assignments</h5>
  </div>
  <div class="card-body">
    <div class="d-flex bd-highlight mb-3">
        <form class="d-flex" role="search">
            <a href="{{ route('assignments.index') }}" class="btn btn-primary">Assignments</a>
            <input class="form-control me-2" style="" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Assignment</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @forelse($assignments as $item)
            <tr>
                <th>{{ $item->id }}</th>
                <td colspan="2">{{ $item->title }}</td>
                <td class="d-flex justify-content-end">
                    <form action="{{ route('unarchive-assignment', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to restore this Assignment? You may view this in the college management page.')">
                    @csrf
                    @method('PUT')

                        <button type="submit" class="btn btn-outline-success">Unarchive</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <th>There are no archived assignments</th>
            </tr>
            @endforelse
        </tbody>
    </table>
  </div>
</div>
@endsection