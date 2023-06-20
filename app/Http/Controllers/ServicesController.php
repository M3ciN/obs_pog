<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Subcategory;

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
        $subcategories = Subcategory::all();
        return view('services.edit', compact('services', 'subcategories'));
    }

    public function update(Request $request, $id)
    {
        $services = Service::find($id);
        $services->name = $request->input('name');
        $services->description = $request->input('description');
        $services->price = $request->input('price');
        $services->subcategory_id = $request->input('subcategory_id');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/img', $imageName);
            $services->image = $imageName;
        }

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
        $subcategories = Subcategory::all();
        $services = Service::all();
        return view('services.create', compact('subcategories', 'services'));
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

        $subcategory_id = $request->input('subcategory');
        $service->subcategory_id = $subcategory_id;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/img', $imageName);
            $service->image = $imageName;
        }

        $service->save();

        return redirect()->route('services.index')->with('success', 'Usługa została dodana.');
    }
}
