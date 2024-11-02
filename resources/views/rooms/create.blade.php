@extends('layout')

@section('content')
<div class="container">
    <h2>Create Room</h2>
    
    <form action="{{ route('rooms.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="room_number">Room Number</label>
            <input type="text" class="form-control" id="room_number" name="room_number" required>
        </div>

        <div class="form-group">
            <label for="building_number">Building Number</label>
            <input type="text" class="form-control" id="building_number" name="building_number" required>
        </div>

        <div class="form-group">
    <label for="department">Department</label>
    <select class="form-control" id="department" name="department" required>
        <option value="" disabled selected>Select Department</option>
        <option value="CAS">CAS (College of Arts and Sciences)</option>
        <option value="CBA">CBA (College of Business and Accountancy)</option>
        <option value="CCJE">CCJE (Criminal Justice Education)</option>
        <option value="COED">COED (College of Education)</option>
        <option value="CAMS">CAMS (College of Allied Medical Sciences)</option>
        <option value="COM">COM (College of Medicine)</option>
        <option value="COL">COL (College of Law)</option>
        <option value="CECT">CECT (College of Engineering and Computer Studies)</option>
        <option value="CHTM">CHTM (College of Hospitality and Tourism Management)</option>
        <option value="CON">CON (College of Nursing)</option>
        <option value="MAN">MAN (MA in Nursing)</option>
        <option value="SOLAS">SOLAS (School of Leadership and Advanced Studies)</option>
        <option value="CWSM">CWSM (Charles Wesley School of Music)</option>
        <option value="WDS">WDS (Wesley Divinity School)</option>
    </select>
</div>


<div class="form-group">
    <label for="professor">Professor</label>
    <select class="form-control" id="professor" name="professor" required>
        <option value="" disabled selected>Select Professor</option>
        @foreach($professors as $professor)
            <option value="{{ $professor->name }}">{{ $professor->name }}</option>
        @endforeach
    </select>
</div>



        <button type="submit" class="btn btn-primary">Save Room</button>
    </form>
</div>
@endsection
