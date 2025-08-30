<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class DashboardController extends Controller
{
   public function index(Request $request)
{
    if (!session('user_id')) {
        return redirect('/login')->with('error', 'Please log in first.');
    }

    $page = $request->get('page', 'dashboard');

    if ($page === 'reservation') {
        session()->forget('editReservation'); // clear edit modal
    }

    $data = [
        'name' => session('user_name'),
        'page' => $page,
    ];

    if (in_array($page, ['reservation', 'reservation-create', 'reservation-edit'])) {
        $data['reservations'] = Reservation::all();
    }

    if ($page === 'reservation-create') {
        $data['showCreateForm'] = true;
        $data['page'] = 'reservation'; // for layout/sidebar
    }

    if ($page === 'reservation-edit' && session()->has('editReservation')) {
        $data['page'] = 'reservation'; // for layout/sidebar
    }

    return view('dashboard', $data);
}
}