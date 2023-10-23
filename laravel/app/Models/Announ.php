<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announ extends Model
{
    use HasFactory;

    protected $fillable = [
        'deal_type',
        'type_real_estate',
        'city',
        'floor',
        'floor_in_house',
        'year_of_construction',
        'quantity_room',
        'total_area',
        'living_area',
        'kitchen_area',
        'link_video',
        'furniture',
        'building_area',
        'state',
        'CeilingHeight',
        'allowKids',
        'allowAnimal',
        'layout',
        'numberSeats',
        'parking',
        'elevator',
        'Balcony',
        'number_of_rent',
        'land_area',
        'Rent',
        'Land_category',
        'house_area',
        'quantity_bedrooms',
        'condition_of_the_home',
        'electricity',
        'rental_period',
        'repair',
        'title',
        'description',
        'price',
        'rental_type',
        'house_type',
        'type_object',
        'owner_id',
        'type_home'
];
}