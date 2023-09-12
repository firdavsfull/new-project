<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Conditions;
use App\Models\Infrastructure;
use Illuminate\Http\Request;

class getDataController extends Controller
{
    public function getCities(){
        $city = City::all();

        return $city;
    }

    public function createInfrastrucures(Request $request){
        
        for ($i=0; $i < count($request->send) ; $i++) { 
            $info = Infrastructure::firstOrCreate(['name'=>$request->send[$i]]);
            return [$info];
        }
            
    }

    public function getConditions(){
        $conditions =  Conditions::all();
        
        return $conditions;
    }

    public function getInfrastrucures(){
        $infrastructures = Infrastructure::all();
        return $infrastructures;
    }
}
