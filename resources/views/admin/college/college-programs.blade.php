@extends('layout')
@section('title', 'College Programs')
@section('content')
<div class="card">
  <div class="card-header text-center">
    <h5 class="card-title">College Programs</h5>
  </div>
  <div class="card-body">
    <div class="d-flex bd-highlight mb-3">
        <form class="d-flex" role="search">
            <input class="form-control me-2" style="" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <a href="{{ route('program.create') }}" class="ms-auto d-flex bd-highlight btn btn-success">Add Program</a>
    </div>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Program Code</th>
            <th scope="col">Program</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @forelse($programs as $item)
            <tr>
                <th>{{ $item->id }}</th>
                <th>{{ $item->program_code }}</th>
                <td colspan="2">{{ $item->program_name }}</td>
                <td class="d-flex justify-content-end">
                    <a class="btn btn-outline-primary me-2" href="{{ route('program.edit', $item->id) }}">Edit</a>
                    <form action="{{ route('programs.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to archive this Program? You may unarchive this in the archived programs page.')">
                    @csrf
                    {{ method_field('DELETE') }}

                        <button type="submit" class="btn btn-danger">Archive</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <th>There are no programs in this college</th>
            </tr>
            @endforelse
        </tbody>
    </table>
  </div>
</div>
@endsection