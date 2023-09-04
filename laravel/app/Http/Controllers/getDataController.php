<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class getDataController extends Controller
{
    public function getCities(){
        $city = City::all();

        return $city;
    }
}
