<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = DB::table('bookings')
            ->where('status', 'Pending')
            ->get();
        return view('partials.booking-requests', ['bookings' => $bookings]);
    }

    public function approve($id)
    {
        $booking = DB::table('bookings')->where('id', $id)->first();
    
        if ($booking) {
            DB::table('bookings')->where('id', $id)->update(['status' => 'Approved']);
            
            // I-convert ang oras mula sa string (e.g., '7pm') patungo sa TIME format
            $preferred_time_24hr = Carbon::parse($booking->preferred_time)->format('H:i:s');
            
            DB::table('reservations')->insert([
                'first_name' => $booking->first_name,
                'last_name' => $booking->last_name,
                'email' => $booking->email,
                'phone' => $booking->phone_number,
                'preferred_date' => $booking->booking_date,
                'preferred_time' => $preferred_time_24hr,
                'service' => $booking->service,
                // Gamitin ang tamang column name na 'instruction'
                'instruction' => $booking->tattoo_piercing_info, 
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            
            return redirect()->route('dashboard', ['page' => 'reservation'])->with('success', 'Booking has been approved and moved to reservations!');
        }
    
        return redirect()->back()->with('error', 'Booking not found.');
    }

    public function cancel($id)
    {
        $booking = DB::table('bookings')->where('id', $id)->first();

        if ($booking) {
            DB::table('bookings')->where('id', $id)->update(['status' => 'Cancelled']);
            return redirect()->route('dashboard', ['page' => 'booking'])->with('success', 'Booking has been cancelled.');
        }

        return redirect()->back()->with('error', 'Booking not found.');
    }
}