<?php

namespace App\Http\Controllers;

use App\Models\Announ;
use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CreateOwnerController extends Controller
{
    public function createOwner(Request $request){
        
        $owner = Owner::firstOrCreate(['phone_number'=> $request->phone]);
            $token = $owner->createToken('user');
            return [$token->plainTextToken,$owner];   
    }
    
    public function UpdateOwner(Request $request){
        $owner = Owner::where('phone_number', $request->phone)->first();
       
             $owner->update([
                'name'=>$request->name,
                'last_name'=>$request->lastName,
                'birth_date'=>$request->date
                ]
             );
            return $owner;
    }

    public function getUser(Request $request){
    $owner = Owner::where('phone_number', $request->phone)->first();
        return $owner;
    }


    public function SendMessage(Request $request){
        $owner = Owner::where('phone_number', $request->phone)->first();
        $owner->update(['email'=>$request->email]);
        return $owner;
    }

    public function getOwnerFromAnnoun(Request $request){
        $owner = Owner::WhereIn('id', $request->owner_id)->get();
        $announ  = Announ::WhereIn('owner_id',$request->owner_id)->get();
        
        return [$announ, $owner];
    }      
}
