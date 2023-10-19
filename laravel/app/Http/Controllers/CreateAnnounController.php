<?php

namespace App\Http\Controllers;

use App\Models\Announ;
use App\Models\ConditionAnnoun;
use App\Models\Facilities;
use App\Models\FacilitiesAnnoun;
use App\Models\Infrastructure;
use App\Models\InfrastructureAnnoun;
use App\Models\Owner;
use App\Models\Pictures;
use Illuminate\Http\Request;
class CreateAnnounController extends Controller
{

    public function createResidentAnnoun(Request $request){
            $announs = $request;
            if ($announs[0]['rent'] == 'Аренда' && $announs[0]['objects'] == 'Квартира' || $announs[0]['objects'] == 'Комната') {  
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
                    'owner_id'=>$request->user()->id
                ]);
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
                return [$announ->id];
            }


            if ($announs[0]['rent'] == 'Аренда' && $announs[0]['objects'] == 'Дом/Дача' || $announs[0]['objects'] == 'Коттедж') {
                $announ = Announ::firstOrCreate([
                    'deal_type'=>$announs[0]['rent'],
                    'rental_type'=>$announs[0]['typeRent'],
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
                    'owner_id'=>$request->user()->id 
                    ]);
                    return[$announ->id];
                }

            if ($announs[0]['rent'] == 'Продажа' && $announs[0]['objects'] == 'Дом/Дача' || $announs[0]['objects'] == 'Коттедж') {
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
                    'owner_id'=>$request->user()->id 
                ]);
                return[$announ->id];
            }
            if ($announs[0]['rent'] == 'Продажа' && $announs[0]['objects'] == 'Квартира' || $announs[0]['objects'] == 'Комната'||$announs[0]['objects'] == 'Квартира в Новостройке') {  
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
                    'title'=>$announs[4]['title'],
                    'description'=>$announs[4]['description'],
                    'price'=>$announs[5]['price'],
                    'owner_id'=>$request->user()->id
                ]);
                return [$announ->id];
            }
                    
    }

    public function createAnnoun(Request $request){
            $commercial = $request->commercial;
            if ($commercial[0]['Estate'] == 'Коммерческая') {
                $announ = Announ::firstOrcreate([
                    'deal_type'=> $commercial[0]['rent'],
                    'type_real_estate'=> $commercial[0]['Estate'],
                    'type_object'=> $commercial[0]['objects'],
                    'city'=> $commercial[1]['city'],
                    'floor'=> $commercial[1]['floor'],
                    'floor_in_house' =>$commercial[1]['floorFrom'],
                    'year_of_construction'=>$commercial[1]['yearConstruction'],
                    'total_area'=>$commercial[1]['totalArea'],
                    'parking'=>$commercial[1]['Parking'],
                    'title'=>$commercial[1]['title'],
                    'description'=>$commercial[1]['description'],
                    'price'=>$commercial[1]['price'],
                    'land_area'=>$commercial[1]['plot'],
                    'building_area'=>$commercial[1]['buildingArea'],
                    'state'=>$commercial[1]['State'],
                    'numberSeats'=>$commercial[1]['numberSeats'],
                    'layout'=>$commercial[1]['layout'],
                    'furniture'=>$commercial[1]['Furniture'],
                    'CeilingHeight'=>$commercial[1]['CeilingHeight'],
                    'owner_id'=>$request->user()->id
                ]);

                if ($commercial[0]['rent'] == 'Аренда') {
                    $announ->update(['rental_type'=>$commercial[0]['typeRent']]);
                }

                if(array_values($commercial[2]) === $commercial[2]){
                    foreach ($commercial[2] as $value) {
                    InfrastructureAnnoun::firstOrCreate(['infrastructure_id'=>$value,'announ_id'=>$announ->id]);
                    }
                }else{
                    return;
                }
                return [$announ->id];
            }
            
    }

    public function getAnnouns(Request $request){
        // $data = Announ::all();
        // $picture = [];
        // for ($i = 0; $i < count($data) ; $i++) { 
        //    $picture[] = Pictures::where('announ_id',$data[$i]['id'])->get();
           
        // }
        // return [$data, $picture];

        $query = Announ::where('type_real_estate','Жилая');

        if ($request->city) {
            $city = $request->city;
            $query->where('city', $city);
        }
            
    
        if ($request->dealType) {
            $dealType = $request->dealType;
            $query->where('deal_type', $dealType);
        }
    
        if ($request->typeObject) {
            $query->where('type_object',$request->typeObject);
        }

        if ($request->quantityRoom) {
            $quantityRoom = $request->quantityRoom;
            $query->WhereIn('quantity_room', $quantityRoom);
        }
    
        if ($request->priceFrom) {
            $query->where('price', '>=',$request->priceFrom);
        }
        if ($request->priceTo) {
            $query->where('price', '<=',$request->priceTo);
        }
        
        
    
        if ($request->totalAreaFrom) {
            $query->where('total_area','>=',$request->totalAreaFrom);  
        }
        
        if ($request->totalAreaTo) {
            $query->where('total_area','<=',$request->totalAreaTo); 
        }

        if ($request->areaFrom) {
            $query->where('house_area','>=',$request->areaFrom);  
        }

        if ($request->areaTo) {
            $query->where('house_area','<=',$request->areaTo);  
        }
        if ($request->kitchenAreaFrom) {
            $query->where('kitchen_area','>=',$request->kitchenAreaFrom);  
        }

        if ($request->kitchenAreaTo) {
            $query->where('kitchen_area','<=',$request->kitchenAreaTo);  
        }

        if ($request->floorFrom) {
            $query->where('floor','>=',$request->floorFrom);  
        }

        if ($request->floorTo) {
            $query->where('floor','<=',$request->floorTo);  
        }

        if ($request->yearFrom) {
            $query->where('year_of_construction','>=',$request->yearFrom);  
        }
        if ($request->yearTo) {
            $query->where('year_of_construction','<=',$request->yearTo);  
        }

        if ($request->typeHome) {
            $query->WhereIn('house_type', $request->typeHome);
        }

        if ($request->balcon) {
            $query->where('Balcony', $request->balcon);
        }
        if ($request->condition) {
            $query->join('condition_announs','announs.id','=','condition_announs.announ_id')
            ->WhereIn('condition_announs.condition_id',$request->condition)
            ->select('announs.*');
        }
        if ($request->repair) {
            $query->WhereIn('repair',$request->repair);
        }

        $data = $query->get();
        $picture = [];
        for ($i = 0; $i < count($data) ; $i++) { 
           $picture[] = Pictures::where('announ_id',$data[$i]['id'])->get();
           
        }
        
        return [$data, $picture];
    }

    public function getAnnounByUser(Request $request){
        $announ = Announ::where('owner_id',$request->id)->get();
        $data = $announ;
        $picture = [];
        for ($i = 0; $i < count($data); $i++) { 
            $picture[] = Pictures::where('announ_id',$data[$i]['id'])
            ->where('position','<',1)
            ->first();
        }
        $allData = [];
        for ($i=0; $i < count($picture); $i++) { 
            $data[$i]['image'] = $picture[$i]['pictures'];
            $allData[] = $data[$i]; 
            //$picture[$i]['pictures'];

        }
        
        return $allData;
      
    }
}
    
