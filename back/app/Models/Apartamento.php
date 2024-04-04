<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'floor',
        'p_supply',
        'elevator',
        'address',
        'city',
        'state',
        'description',
        'price',
        'n_rooms',
        'n_baths',
        'n_parking',
        'type',
        'meters',
        'status'
    ];
}
