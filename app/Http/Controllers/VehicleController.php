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

    public function save(Request $request)
    {
        $input = [];
        $input['brand'] = $request->brand;
        $input['model'] = $request->model;
        $input['type'] = $request->type;
        $input['year'] = $request->year;
        $input['status'] = 1;
        $input['created_at'] = now();

        Vehicle::insert($input);

        //get ID from the new inserted data
        //$vehicleId = Vehicle::insertGetId($input);

        return redirect(route('vehicle.index'));
    }
}
