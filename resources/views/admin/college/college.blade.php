@extends('layout')
@section('title', 'College Management')
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
    <h5 class="card-title">College Management</h5>
  </div>
  <div class="card-body">
    <div class="d-flex bd-highlight mb-3">
        <form class="d-flex" role="search">
            <input class="form-control me-2" style="" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <a href="{{ route('college.create') }}" class="ms-auto d-flex bd-highlight btn btn-success">Add College</a>
    </div>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">College</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @forelse($colleges as $item)
            <tr>
                <th>{{ $item->id }}</th>
                <td colspan="2">{{ $item->college_name }}</td>
                <td class="d-flex justify-content-end">
                    <a class="btn btn-outline-primary me-2" href="{{ route('college.edit', $item->id) }}">Edit</a>
                    <form action="{{ route('colleges.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to archive this College? You may unarchive this in the archived colleges page.')">
                    @csrf
                    {{ method_field('DELETE') }}

                        <button type="submit" class="btn btn-danger">Archive</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <th>There are no colleges</th>
            </tr>
            @endforelse
        </tbody>
    </table>
  </div>
</div>
@endsection