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
}
