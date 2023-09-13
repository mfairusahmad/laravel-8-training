<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vehicle extends Model
{
    use HasFactory;

    protected $table = 'vehicle';
    protected $primaryKey = 'id';

    public static function getVehicleDetail($id)
    {
        $vehicles = DB::select("select * from vehicle where id = " . $id);
        return $vehicles;
    }
}
