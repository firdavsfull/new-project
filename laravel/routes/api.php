<?php

use App\Http\Controllers\CreateAnnounController;
use App\Http\Controllers\CreateOwnerController;
use App\Http\Controllers\createPictureController;
use App\Http\Controllers\getDataController;
use App\Http\Controllers\getImageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/create_user', [CreateOwnerController::class, 'createOwner']);
Route::get('/city', [getDataController::class, 'getCities']);
Route::post('/create/city', [getDataController::class,'createCity']);
Route::post('/create/furniture', [getDataController::class,'createFurniture']);

Route::post('/upload-image',[getImageController::class,'createImageFiles']);

Route::post('/create/announ',[CreateAnnounController::class, 'createAnnoun']);
Route::get('/conditions',[getDataController::class ,'getCondition']);
Route::get('/infrastructure', [getDataController::class,'getInfrastrucures']);
Route::post('/create/infrastructure', [getDataController::class,'createInfrastrucures']);

Route::get('/image/{folder}/{name}',function($folder,$name){
    return response()->download(public_path("$folder/$name",));
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});