<?php

namespace App\Http\Controllers;

use App\Models\Announ;
use App\Models\Owner;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CreateOwnerController extends Controller
{
    public function createOwner(Request $request){
        // $owner = Owner::firstOrCreate(['phone_number'=> $request->phone]);
        // $token = $owner->createToken('user');
        // sleep(0);
        // return ;
        // $currentDate = date("Y-m-d H:i:s");
        // $minute = date('i');
        // $request->validate([
        //     'phone_number' => 'required|unique:owners',
        // ]);

        $phone = $request->phone;
        $today = Carbon::now();
        $today->format('Y-m-d H:i:s');

        // Генерация верификационного кода
        $verificationCode = strval(random_int(100000, 999999));
        // // Сохранение номера телефона и верификационного кода в базе данных
        $owner = Owner::firstOrCreate([
            'phone_number' => $phone,
        ]);
        $token = $owner->createToken('user');
        $owner->where('phone_number',$phone)
        ->update(['verification_code' => $verificationCode]);

        // $token = $owner->createToken('user');
        // return [$owner,$token];

        // return $today->format('i')-($today->format('i')-1); 
        // response()->json(['message' => 'Неправильный верификационный код.']);
        return [$verificationCode,$token->plainTextToken];
    }
    public function verifyUser(Request $request){
        // $owner = Owner::where('phone_number',$request->phone)->get();
        $user = Owner::where('verification_code',$request->code)->get();
        // $token = $owner->createToken('user');
        return $user;
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
