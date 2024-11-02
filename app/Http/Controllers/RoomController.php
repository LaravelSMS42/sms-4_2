<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Booking;

class RoomController extends Controller
{
    public function create()
    {
        $professors = Employee::where('role', 'Professor')->get();
        return view('rooms.create', compact('professors'));
    }

    public function show()
    {
        $rooms = Room::all();
        $professors = Employee::where('role', 'Professor')->get();
        return view('rooms.show', compact('rooms', 'professors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_number' => 'required',
            'building_number' => 'required',
            'department' => 'required',
            'professor' => 'required',
        ]);

        Room::create($request->all());

        return redirect()->route('rooms.show')->with('success', 'Room created successfully');
    }

    public function remove($id) // Renamed from destroy to remove
    {
        $room = Room::findOrFail($id);
        $room->delete();

        return redirect()->route('rooms.show')->with('success', 'Room deleted successfully');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'room_number' => 'required',
            'building_number' => 'required',
            'department' => 'required',
            'professor' => 'required',
        ]);

        $room = Room::findOrFail($id);
        $room->update($request->all());

        return redirect()->route('rooms.show')->with('success', 'Room updated successfully');
    }

    public function book(Request $request, $id) 
    {
        $request->validate([
            'booking_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'booked_by' => 'required|string',
        ]);
    
        // Check for conflicting bookings
        $conflict = Booking::where('room_id', $id)
            ->where('booking_date', $request->input('booking_date'))
            ->where(function ($query) use ($request) {
                $query->whereBetween('start_time', [$request->input('start_time'), $request->input('end_time')])
                      ->orWhereBetween('end_time', [$request->input('start_time'), $request->input('end_time')]);
            })
            ->exists();
    
        if ($conflict) {
            return redirect()->route('rooms.show')->with('error', 'Booking conflict detected. Please choose another time.');
        }
    
        // Create a new booking record
        Booking::create([
            'room_id' => $id,
            'booked_by' => $request->input('booked_by'),
            'booking_date' => $request->input('booking_date'),
            'start_time' => $request->input('start_time'),
            'end_time' => $request->input('end_time'),
        ]);
    
        return redirect()->route('rooms.show')->with('success', 'Room booked successfully.');
    }

    public function booked()
    {
        // Fetch all bookings from the database
        $bookings = Booking::with('room')->get(); // Use eager loading to get room data
        
        // Return the booked view to display the list of booked rooms
        return view('rooms.booked', compact('bookings'));
    }

    public function destroy($id)
{
    $booking = Booking::findOrFail($id);
    $booking->delete();
    return redirect()->route('rooms.booked')->with('success', 'Booking deleted successfully.');
}

public function updateBooking(Request $request, $id)
{
    // Find the booking record
    $booking = Booking::findOrFail($id);

    // Validate the request data
    $request->validate([
        'booking_date' => 'required|date',
        'start_time' => 'nullable|date_format:H:i',
        'end_time' => 'nullable|date_format:H:i|after:start_time',
        'booked_by' => 'required|string',
    ]);

    // Determine the new values, using existing ones if not provided
    $updatedData = [
        'booked_by' => $request->input('booked_by'),
        'booking_date' => $request->input('booking_date'),
        'start_time' => $request->input('start_time') ?? $booking->start_time, // Use existing if not provided
        'end_time' => $request->input('end_time') ?? $booking->end_time, // Use existing if not provided
    ];

    // Check for conflicting bookings only if new times are provided
    $conflict = Booking::where('room_id', $booking->room_id)
        ->where('booking_date', $request->input('booking_date'))
        ->where('id', '!=', $id) // Exclude the current booking
        ->where(function ($query) use ($updatedData) {
            $query->whereBetween('start_time', [$updatedData['start_time'], $updatedData['end_time']])
                  ->orWhereBetween('end_time', [$updatedData['start_time'], $updatedData['end_time']]);
        })
        ->exists();

    if ($conflict) {
        return redirect()->route('rooms.booked')->with('error', 'Booking conflict detected. Please choose another time.');
    }

    // Update the booking record
    $booking->update($updatedData);

    return redirect()->route('rooms.booked')->with('success', 'Booking updated successfully.');
}

}
