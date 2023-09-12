<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::get();
        /*$vehicles = Vehicle::select('brand','model')->where('id','>', 1)->get();
        foreach ($vehicles as $row) {
            echo $row->brand;
        }
        exit();
        */

        return view('vehicle.index', compact('vehicles'));
    }

    public function create()
    {
        return view('vehicle.form');
    }
}
