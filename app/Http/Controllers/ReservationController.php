<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Service;

class ReservationController extends Controller
{
    public function create()
    {
        $services = Service::all();
        return view('reservations.create', compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'phone_number' => 'required',
            'address' => 'required',
            'funeral_date' => 'required',
            'service_id' => 'required|array',
            'service_id.*' => 'exists:services,id',
            'service_price' => 'required|array',
            'service_price.*' => 'numeric|min:0',
        ]);

        $reservation = new Reservation();
        $reservation->user_id = auth()->user()->id;
        $reservation->phone_number = $request->input('phone_number');
        $reservation->address = $request->input('address');
        $reservation->funeral_date = $request->input('funeral_date');
        $reservation->service_id = $request->input('service_id');
        $reservation->save();

        return redirect()->back()->with('success', 'Rezerwacja została zapisana.');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}

