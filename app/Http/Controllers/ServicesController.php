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
}
