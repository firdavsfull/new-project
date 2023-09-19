<?php

namespace App\Http\Controllers;
use Intervention\Image\ImageManager;
use Illuminate\Http\Request;

class createPictureController extends Controller
{
        public function createPicture(Request $request){        
        return [$request->file('images')];

        // return response()->file(storage_path('app/public/images/'). $request->formatImage . $name);
    }
}
