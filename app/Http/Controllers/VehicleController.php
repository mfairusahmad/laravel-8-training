<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::get();
        //dd($vehicles);

        return view('vehicle.index', compact('vehicles'));
    }

    public function create()
    {
        return view('vehicle.form');
    }
}
