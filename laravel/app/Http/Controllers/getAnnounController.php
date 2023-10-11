<?php

namespace App\Http\Controllers;

use App\Models\Announ;
use App\Models\Pictures;
use Illuminate\Http\Request;

class getAnnounController extends Controller
{
    // public function getData(){
    //     $announ = Announ::all();
    //     return $announ;
    // }

    public function getData(Request $request){
        $pictures = Pictures::where('position','<',1)->get();
        
        $announ = Announ::join('pictures','announs.id', 'pictures.announ_id')
        ->where('pictures.position', 0)
        ->select('announs.*')
        ->get();
        $allData = [];
        for ($i=0; $i < count($pictures); $i++) { 
            $announ[$i]['image'] = $pictures[$i]['pictures'];
            $allData[] =  $announ[$i];
        }
        return $allData;
    }
}
