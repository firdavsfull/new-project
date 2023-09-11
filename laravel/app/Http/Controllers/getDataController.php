<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Conditions;
use Illuminate\Http\Request;

class getDataController extends Controller
{
    public function getCities(){
        $city = City::all();

        return $city;
    }

    public function getConditions(){
        $conditions =  Conditions::all();
        
        return $conditions;
    }
}
