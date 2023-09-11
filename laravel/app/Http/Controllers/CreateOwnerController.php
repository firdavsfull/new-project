<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CreateOwnerController extends Controller
{
    public function createOwner(Request $request){
        
        Owner::firstOrCreate(['phone_number'=> $request->phone]);
        
            $owners = Owner::find(1);
            $get_user = $owners->where('phone_number',$request->phone);
            return [$get_user->get()];   
    }
}
