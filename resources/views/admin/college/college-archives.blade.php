@extends('layout')
@section('title', 'Archived Colleges')
@section('content')
<div class="card">
  <div class="card-header text-center">
    <h5 class="card-title">Archived Colleges</h5>
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
            <th scope="col">College</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach($colleges as $item)
            <tr>
                <th>{{ $item->id }}</th>
                <td colspan="2">{{ $item->college_name }}</td>
                <td class="d-flex justify-content-end">
                    <form action="{{ route('unarchive-college', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to restore this College? You may view this in the college management page.')">
                    @csrf
                    @method('PUT')

                        <button type="submit" class="btn btn-outline-success">Unarchive</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
  </div>
</div>
@endsection