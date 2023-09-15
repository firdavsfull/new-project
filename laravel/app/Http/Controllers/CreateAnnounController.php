<?php

namespace App\Http\Controllers;

use App\Models\Announ;
use App\Models\ConditionAnnoun;
use App\Models\Facilities;
use App\Models\FacilitiesAnnoun;
use App\Models\Owner;
use Illuminate\Http\Request;
class CreateAnnounController extends Controller
{
    public function createAnnoun(Request $request){
        $owner = Owner::find(1);
        $announs = $request->json()->all();
            if ($announs[0]['objects'] == 'Квартира') {  
                $announ = Announ::firstOrCreate([
                    'deal_type'=>$announs[0]['rent'],
                    'type_real_estate'=>$announs[0]['Estate'],
                    'type_object'=>$announs[0]['objects'],
                    'city'=>$announs[1]['city'],
                    'floor'=>$announs[1]['floor'],
                    'floor_in_house'=>$announs[1]['floorHouse'],
                    'year_of_construction'=>$announs[1]['year'],
                    'house_type'=>$announs[1]['selectType'],
                    'total_area'=>$announs[2]['generalArea'],
                    'kitchen_area'=>$announs[2]['kitchenArea'],
                    'living_area'=>$announs[2]['liveArea'],
                    'quantity_room'=>$announs[2]['quantityRoom'],
                    'repair'=>$announs[3]['repair'],
                    'elevator'=>$announs[3]['elevator'],
                    'Balcony'=>$announs[3]['balcon'],
                    'parking'=>$announs[3]['parking'],
                    'title'=>$announs[5]['title'],
                    'description'=>$announs[5]['description'],
                    'price'=>$announs[6]['price'],
                    'rental_period'=>$announs[6]['period'],
                    'owner_id'=>$owner->id 
                ]);
            }
            if ($announs[0]['objects'] == 'Дом/Дача' || $announs[0]['objects'] == 'Коттедж') {
                $announ = Announ::firstOrCreate([
                    'deal_type'=>$announs[0]['rent'],
                    'type_real_estate'=>$announs[0]['Estate'],
                    'type_object'=>$announs[0]['objects'],
                    'city'=>$announs[1]['city'],
                    'floor_in_house'=>$announs[1]['floorHouse'],
                    'house_area'=>$announs[4]['homeArea'],
                    'year_of_construction'=>$announs[1]['year'],
                    'house_type'=>$announs[1]['selectType'],
                    'land_area'=>$announs[4]['landArea'],
                    'quantity_bedrooms'=>$announs[4]['quantityBedroom'],
                    'repair'=>$announs[3]['repair'],
                    'Balcony'=>$announs[3]['balcon'],
                    'parking'=>$announs[3]['parking'],
                    'Land_category'=>$announs[4]['landCategry'],
                    'condition_of_the_home'=>$announs[4]['conditionHome'],
                    'electricity'=>$announs[4]['electricity'],
                    'title'=>$announs[5]['title'],
                    'description'=>$announs[5]['description'],
                    'price'=>$announs[6]['price'],
                    'rental_period'=>$announs[6]['period'],
                    'owner_id'=>$owner->id 
                ]);
            }
            if ($announs[0]['rent'] == 'Аренда') {
                $announ->update(['rental_type'=>$announs[0]['typeRent']]);
            }
        

        
            if(array_values($announs[4]) === $announs[4]){
                foreach ($announs[4] as $value) {
                ConditionAnnoun::firstOrCreate(['condition_id'=>$value,'announ_id'=>$announ->id]);
                }
            }else{
                return;
            }

    }
}