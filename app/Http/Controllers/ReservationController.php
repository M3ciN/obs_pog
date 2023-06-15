<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function create()
    {
        $services = Service::all();

        return view('reservation.create', compact('services'));
    }

    public function store(Request $request)
    {
        // Walidacja danych
        $validatedData = $request->validate([
            'phone_number' => 'required',
            'address' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'services' => 'required|array',
            'services.*' => 'exists:services,id',
        ]);

        // Pobierz zalogowanego użytkownika
        $userId = Auth::id();

        // Zapisz rezerwację w bazie danych
        // Przykładowy kod zapisu:
        $reservation = new Reservation();
        $reservation->user_id = $userId;
        $reservation->phone_number = $validatedData['phone_number'];
        $reservation->address = $validatedData['address'];
        $reservation->date = $validatedData['date'];
        $reservation->time = $validatedData['time'];
        $reservation->save();

        // Przypisanie usług do rezerwacji
        $reservation->services()->attach($validatedData['services']);

        // Przekierowanie po zapisaniu rezerwacji
        return redirect()->route('reservation.create')->with('success', 'Rezerwacja została zapisana.');
    }

    public function index()
    {
        $user = Auth::user();
        $reservations = $user->reservations()->with('services')->get();

        return view('reservation.index', compact('reservations'));
    }
}
