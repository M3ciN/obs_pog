<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ObsPogController extends Controller
{
    public function index()
    {
        return view('obs_pog.index');
    }
}

