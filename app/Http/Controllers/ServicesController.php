<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('services.index', ['services' => $services]);
    }

    public function edit($id)
    {
        $services = Service::find($id);
        return view('services.edit', compact('services'));
    }

    public function update(Request $request, $id)
    {
        $services = Service::find($id);
        $services->name = $request->input('name');
        $services->opis = $request->input('opis');
        $services->price = $request->input('price');
        // Inne pola, które chcesz edytować
        $services->save();
        return redirect()->route('services.index')->with('success', 'Dane usługi zostały zaktualizowane.');
    }

    public function destroy($id)
    {
        $user = Service::find($id);
        $user->delete();

        return redirect()->route('services.index')->with('success', 'Usługa został usunięta.');
    }

    public function create()
    {
        return view('services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'opis' => 'required',
            'price' => 'required|numeric',
        ]);

        $service = new Service();
        $service->name = $request->input('name');
        $service->opis = $request->input('opis');
        $service->price = $request->input('price');
        $service->save();

        return redirect()->route('services.index')->with('success', 'Usługa została dodana.');
    }
}
