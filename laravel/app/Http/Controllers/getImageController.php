<?php

namespace App\Http\Controllers;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

class getImageController extends Controller
{
    public function createImageFiles(Request $request){

        $images = $request->file('images');
        $filename = [];
        foreach ($images as $image) {
            $name = uniqid() . '.'.$image->getClientOriginalExtension();
            $filename[] = [
                'xsmall' => 'xsmall/'. $name,
                'small' => 'small/'. $name,
                'medium' => 'medium/'. $name,
                'large' => 'large/'. $name,
            ];
            $img = Image::make($image);
            $img->fit(2250, 950)->save(public_path('large/' . $name));
            
            $img->fit(1400, 800)->save(public_path('medium/' . $name));
            
            $img->fit(700, 400)->save(public_path('small/' . $name));
            
            $img->fit(350, 200)->save(public_path('xsmall/' . $name));
        }
        return $filename;
    }
}
