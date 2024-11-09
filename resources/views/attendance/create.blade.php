@extends('layout')

@section('content')
<div class="container">
    <h2>Attendance Management</h2>
    <div id="status-buttons" class="mt-3" style="display: none;">
        <button id="present" class="btn btn-success">Present</button>
        <button id="absent" class="btn btn-danger">Absent</button>
        <button id="late" class="btn btn-warning">Late</button>
        <button id="remove" class="btn btn-secondary">Remove</button> <!-- New Remove Button -->
    </div>

    <div id="attendance-status" class="mt-2"></div>

    <h3 class="mt-5">Attendance Calendar</h3>
    <div id="attendance-calendar"></div> <!-- Updated calendar styling -->
</div>

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>
        /* Overall styling for the container */
        .container {
            max-width: 800px;
            margin: 0 auto;
            font-family: Arial, sans-serif;
        }

        /* Header and labels */
        h2, h3 {
            color: #333;
            text-align: left;
            font-weight: bold;
        }

        /* Larger calendar size and soft colors */
        .ui-datepicker {
            font-size: 1.1em;
            width: 100%;
            background: #f5f5f5;
            border-radius: 8px;
            padding: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Weekday and day styles */
        .ui-datepicker table {
            width: 100%;
        }
        .ui-datepicker th {
            color: #666;
            font-weight: bold;
            padding: 5px;
        }
        .ui-datepicker td {
            padding: 8px;
        }
        .ui-datepicker td a {
            padding: 8px;
            display: block;
            text-align: center;
            border-radius: 50%;
            color: #333;
        }

        /* Attendance status colors */
        .present-date a {
            background-color: #28a745 !important; /* Green for present */
            color: white !important;
        }
        .absent-date a {
            background-color: #dc3545 !important; /* Red for absent */
            color: white !important;
        }
        .late-date a {
            background-color: #ffc107 !important; /* Yellow for late */
            color: black !important;
        }

        /* Hover effect for days */
        .ui-datepicker td a:hover {
            background-color: #d1eaff !important;
            color: #333 !important;
        }

        /* Button styles */
        #status-buttons .btn {
            font-size: 0.9em;
            padding: 8px 12px;
            margin-right: 8px;
        }
    </style>
</head>

<script>
    let selectedDate = null;
    const employeeId = "{{ $id }}";

    $(document).ready(function() {
        // Top Date Picker for attendance selection
        $("#datepicker").datepicker({
            dateFormat: 'mm/dd/yy',
            onSelect: function(dateText) {
                selectedDate = dateText;
                $('#status-buttons').show();
                $('#attendance-status').text(`Selected date: ${selectedDate}`);
            }
        });

        // Bottom Attendance Calendar with larger size and click-to-update feature
        loadAttendanceCalendar();

        function loadAttendanceCalendar() {
            $.ajax({
                url: `/attendance/${employeeId}/dates`,
                method: 'GET',
                success: function(data) {
                    const attendanceData = data;

                    $("#attendance-calendar").datepicker({
                        dateFormat: 'mm/dd/yy',
                        beforeShowDay: function(date) {
                            const formattedDate = $.datepicker.formatDate('yy-mm-dd', date);
                            const status = attendanceData[formattedDate];
                            if (status === 'present') {
                                return [true, 'present-date'];
                            } else if (status === 'absent') {
                                return [true, 'absent-date'];
                            } else if (status === 'late') {
                                return [true, 'late-date'];
                            }
                            return [true, ''];
                        },
                        onSelect: function(dateText) {
                            selectedDate = dateText;
                            $('#status-buttons').show();
                            $('#attendance-status').text(`Selected date: ${selectedDate}`);
                        }
                    });
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                    alert('Failed to load attendance data.');
                }
            });
        }

        // Set attendance status using buttons
        $('#present').click(function() { setAttendanceStatus('present'); });
        $('#absent').click(function() { setAttendanceStatus('absent'); });
        $('#late').click(function() { setAttendanceStatus('late'); });
        $('#remove').click(function() { removeAttendanceStatus(); }); // Remove button functionality
    });

    function setAttendanceStatus(status) {
        if (selectedDate) {
            const parts = selectedDate.split('/');
            const formattedDate = `${parts[2]}-${parts[0]}-${parts[1]}`; // Convert to YYYY-MM-DD

            $.ajax({
                url: `/attendance`,
                method: 'POST',
                data: {
                    employee_id: employeeId,
                    date: formattedDate,
                    status: status,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('#attendance-status').append(`<div>${formattedDate}: ${status.charAt(0).toUpperCase() + status.slice(1)}</div>`);
                    $('#status-buttons').hide();
                    loadAttendanceCalendar(); // Reload calendar to reflect status change
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                    alert('Failed to record attendance. Please try again.');
                }
            });
        }
    }

    function removeAttendanceStatus() {
        if (selectedDate) {
            const parts = selectedDate.split('/');
            const formattedDate = `${parts[2]}-${parts[0]}-${parts[1]}`; // Convert to YYYY-MM-DD

            $.ajax({
                url: `/attendance/remove`, // API endpoint to remove attendance status
                method: 'POST',
                data: {
                    employee_id: employeeId,
                    date: formattedDate,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('#attendance-status').append(`<div>${formattedDate}: Status removed</div>`);
                    $('#status-buttons').hide();
                    loadAttendanceCalendar(); // Reload calendar to reflect status removal
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                    alert('Failed to remove attendance. Please try again.');
                }
            });
        }
    }
</script>
@endsection
