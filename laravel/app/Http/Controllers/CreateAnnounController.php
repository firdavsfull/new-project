<?php

namespace App\Http\Controllers;

use App\Models\Announ;
use Illuminate\Http\Request;
class CreateAnnounController extends Controller
{
    public function createAnnoun(Request $request){
        $announs = $request->json()->all();
        $arr = [];
        foreach ($announs as $announ) {
            Announ::firstOrCreate([
            'deal_type'=>$announ['rent'],
            'type_real_estate'=>$announ['Estate'],
            'type_object'=>$announ['objects'],
            'rental_type'=>$announ['typeRent'],
            'Rent'=>$announ['typeRent'],
            'city'=>$announ['city'],
            'floor'=>$announ['floor'],
            'floor_in_house'=>$announ['floorHouse'],
            'year_of_construction'=>$announ['year'],
            'type_home'=>$announ['selectType'],
            'total_area'=>$announ['generalArea'],
            'kitchen_area'=>$announ['kitchenArea'],
            'living_area'=>$announ['liveArea'],
            'quantity_room'=>$announ['quantityRoom'],
            'repair'=>$announ['repair'],
            'elevator'=>$announ['elevator'],
            'Balcony'=>$announ['balcon'],
            'parking'=>$announ['parking'],
            'title'=>$announ['title'],
            'description'=>$announ['description'],
            'price'=>$announ['price'],
            'rental_period'=>$announ['period']
        ]);
            $arr[]= $announ;
        return [$announ['Estate']];
        }
    }
}
