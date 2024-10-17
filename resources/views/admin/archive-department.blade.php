@extends('layout')
@section('title', 'Archive Confirmation')
@section('content')
<div class="card text-center">
    <div class="card-header text-center">
        <h5 class="card-title">Archive Confirmation</h5>
    </div>
    <form>
        <div class="card-body flex-column">
            <label for="confirmationText" class="mb-3">
                Before archiving, make sure to archive first all 
                related entities like courses, faculties 
                and programs to prevent errors. 
                </br></br>
                Type 'archive' to continue archiving.
            </label>
            <div class="form-group row mb-3 d-flex justify-content-center">
                <input type="text" class="form-control w-50" id="confirmationText">
            </div>
        </div>
        <div class="card-footer">
            <div class="d-flex justify-content-end bd-highlight gap-2">
                <button type="button" class="btn btn-danger">Archive</button>
                <button type="button" class="btn btn-primary">Cancel</button>
            </div>
        </div>
    </form>
</div>
@endsection