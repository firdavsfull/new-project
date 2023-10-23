<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Models\Pictures;
// use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Session;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

class getImageController extends Controller
{
    public $names = [];

    public function createImageFiles(Request $request)
    {
        $images = $request->file('images');
        $filename = [];

        foreach ($images as $image) {
            $this->names[] = $name = uniqid() . '.' . $image->getClientOriginalExtension();
            $filename[] = [
                'name'=>$name,
                'xsmall' => 'xsmall/' . $name,
                'small' => 'small/' . $name,
                'medium' => 'medium/' . $name,
                'large' => 'large/' . $name,
            ];

            $img = Image::make($image);
            $img->fit(2250, 950)->save(public_path('large/' . $name));

            $img->fit(1400, 800)->save(public_path('medium/' . $name));

            $img->fit(700, 400)->save(public_path('small/' . $name));

            $img->fit(350, 200)->save(public_path('xsmall/' . $name));
        }
    
        $dataImage = $request->dataImage;
        return $dataImage;
    }

    public function saveImageFiles(Request $request)
    {   
        $images = $request->json()->all();
        foreach ($request->image as $dataImg) { 
           $pictures = Pictures::create([
                'pictures'=>$dataImg['name'],
                'position'=>$dataImg['position'],
                'rotation'=>$dataImg['rotation'],
                'announ_id'=>$dataImg['id']
            ]);
        } 
        return $request->image;
    }

    public function getAvatar(Request $request){
        $file = $request->file('avatar');
        $image = Image::make($file);
        $name = uniqid() . '.'. $file->getClientOriginalExtension();
        $image->fit(700, 400)->save(public_path('avatar/' . $name));
        
        $owner = Owner::where('phone_number', $request->phone)->first();
        $owner->update(['avatar'=>$name]);

        return $owner;
    }
}
