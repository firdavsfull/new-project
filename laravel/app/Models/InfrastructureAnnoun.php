<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfrastructureAnnoun extends Model
{
    use HasFactory;
    protected $fillable = ['infrastructure_id','announ_id'];
}
