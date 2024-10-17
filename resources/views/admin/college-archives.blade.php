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
            <tr>
                <th>1</th>
                <td colspan="2">College of Engineering and Computer Technologies</td>
                <td class="text-end">
                    <button class="btn btn-success" type="submit">Unarchive</button>
                </td>
            </tr>
            <tr>
                <th>2</th>
                <td colspan="2">College of Business and Accountancy</td>
                <td class="text-end">
                    <button class="btn btn-success" type="submit">Unarchive</button>
                </td>
            </tr>
            <tr>
                <th>3</th>
                <td colspan="2">College of Arts</td>
                <td class="text-end">
                    <button class="btn btn-success" type="submit">Unarchive</button>
                </td>
            </tr>
        </tbody>
    </table>
  </div>
</div>
@endsection