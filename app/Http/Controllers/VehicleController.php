<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::get();
        // $id = 3;
        // $vehicles = Vehicle::getVehicleDetail($id);
        // dd($vehicles);

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
        $edit = false;
        return view('vehicle.form', compact('edit'));
    }

    public function save(Request $request)
    {
        $input = [];
        $input['brand'] = $request->brand;
        $input['model'] = $request->model;
        $input['type'] = $request->type;
        $input['year'] = $request->year;
        $input['created_at'] = now();

        DB::beginTransaction();
        try {
            Vehicle::insert($input);
            DB::commit();
        } catch (\Exception $ex) {
            // dd($ex);
            DB::rollBack();
        }

        //get ID from the new inserted data
        //$vehicleId = Vehicle::insertGetId($input);

        return redirect(route('vehicle.index'))->withSuccess('Vehicle Data Successfully Created!');
    }

    public function edit($encryptId)
    {
        $id = Crypt::decrypt($encryptId);
        $edit = true;
        $vehicle = Vehicle::where('id', $id)->first();

        return view('vehicle.form', compact('vehicle', 'edit'));
    }

    public function update(Request $request, $id)
    {
        $input = [];
        $input['brand'] = $request->brand;
        $input['model'] = $request->model;
        $input['type'] = $request->type;
        $input['year'] = $request->year;
        $input['updated_at'] = now();

        Vehicle::where('id', $id)->update($input);
        return redirect(route('vehicle.index'))->withSuccess('Vehicle Data Successfully Updated!');
    }

    public function delete($id)
    {
        Vehicle::where('id', $id)->delete();
        return redirect(route('vehicle.index'))->withSuccess('Vehicle Data Successfully Deleted!');
    }

    public function softDelete($id)
    {
        $input = [];
        $input['status'] = 0;
        $input['deleted_at'] = now();

        Vehicle::where('id', $id)->update($input);
        return redirect(route('vehicle.index'))->withSuccess('Vehicle Data Successfully Deleted!');
    }
}
