<?php

namespace App\Http\Controllers;

use App\Models\Announ;
use Illuminate\Http\Request;
class CreateAnnounController extends Controller
{
    public function createAnnoun(Request $request){
        return [$request];
    }
}
