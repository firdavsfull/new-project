<?php

use App\Http\Controllers\CreateAnnounController;
use App\Http\Controllers\CreateOwnerController;
use App\Http\Controllers\createPictureController;
use App\Http\Controllers\deleteAnnounController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\getAnnounController;
use App\Http\Controllers\getDataController;
use App\Http\Controllers\getImageController;
use App\Http\Controllers\UpdateAnnounController;
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

Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::post('/create/announ/commercial', [CreateAnnounController::class, 'createAnnoun']);
    Route::post('/create/announ',[CreateAnnounController::class, 'createResidentAnnoun']);
    Route::post('/save-pictures',[getImageController::class, 'saveImageFiles']);
    Route::post('/upload-image',[getImageController::class,'createImageFiles']);
    Route::post('/update_user',[CreateOwnerController::class,'UpdateOwner']);
    Route::post('/avatar',[getImageController::class,'getAvatar']);
    Route::post('/get_user',[CreateOwnerController::class,'getUser']);
    Route::post('/get_announs_by_user',[CreateAnnounController::class,'getAnnounByUser']);
    Route::post('/delete-announ',[deleteAnnounController::class,'deleteAnnoun']);
    Route::post('/update-announ',[UpdateAnnounController::class,'updateAnnoun']);
    Route::post('/restore',[UpdateAnnounController::class,'restoreData']);
});

Route::get('/avatar/{name}',function($name){
    return response()->download(public_path("avatar/$name",));
});

Route::post('/get-data-info',[UpdateAnnounController::class,'getDataInfo']);
Route::post('/get_user_with_announ',[CreateOwnerController::class,'getOwnerFromAnnoun']);
Route::post('/get_announs',[CreateAnnounController::class,'getAnnouns']);
Route::get('/get_data',[getAnnounController::class, 'getData']);
Route::post('/create_user', [CreateOwnerController::class, 'createOwner']);
Route::post('/verify-user', [CreateOwnerController::class, 'verifyUser']);
Route::post('/filter',[FilterController::class,'FiltersAnnoun']);



Route::get('/city', [getDataController::class, 'getCities']);
Route::post('/create/city', [getDataController::class,'createCity']);
Route::post('/create/furniture', [getDataController::class,'createFurniture']);

Route::post('/send_message',[CreateOwnerController::class,'SendMessage']);



Route::get('/conditions',[getDataController::class ,'getCondition']);
Route::get('/infrastructure', [getDataController::class,'getInfrastrucures']);
Route::post('/create/infrastructure', [getDataController::class,'createInfrastrucures']);

Route::get('/image/{folder}/{name}',function($folder, $name){
    return response()->download(public_path("$folder/$name",));
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});