@extends('layout')

@section('content')
<div class="container">
    <h2>Attendance Management</h2>
    <label for="datepicker">Select a date:</label>
    <input type="text" id="datepicker" class="form-control" style="width: 200px; display: inline-block;">
    
    <div id="status-buttons" class="mt-3" style="display: none;">
        <button id="present" class="btn btn-success">Present</button>
        <button id="absent" class="btn btn-danger">Absent</button>
        <button id="late" class="btn btn-warning">Late</button>
    </div>

    <div id="attendance-status" class="mt-2"></div>
</div>

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>

<script>
    let selectedDate = null; 
    const employeeId = "{{ $id }}"; // Use the passed employee id

    $(document).ready(function() {
        $("#datepicker").datepicker({
            dateFormat: 'mm/dd/yy', // Set the date format
            onSelect: function(dateText) {
                selectedDate = dateText; 
                $('#status-buttons').show(); 
                $('#attendance-status').text(`Selected date: ${selectedDate}`); 
            }
        });

        $('#present').click(function() {
            setAttendanceStatus('present');
        });

        $('#absent').click(function() {
            setAttendanceStatus('absent');
        });

        $('#late').click(function() {
            setAttendanceStatus('late');
        });
    });

    function setAttendanceStatus(status) {
        if (selectedDate) {
            // Convert the date to YYYY-MM-DD format
            const parts = selectedDate.split('/');
            const formattedDate = `${parts[2]}-${parts[0]}-${parts[1]}`; // YYYY-MM-DD format

            $.ajax({
                url: `/attendance`, // Change to the correct URL
                method: 'POST',
                data: {
                    employee_id: employeeId, // Include employee_id here
                    date: formattedDate, // Use formatted date here
                    status: status,
                    _token: '{{ csrf_token() }}' 
                },
                success: function(response) {
                    $('#attendance-status').append(`<div>${formattedDate}: ${status.charAt(0).toUpperCase() + status.slice(1)}</div>`);
                    $('#status-buttons').hide(); 
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                    alert('Failed to record attendance. Please try again.');
                }
            });
        }
    }
</script>
@endsection
