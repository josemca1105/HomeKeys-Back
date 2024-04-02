<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Casa extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
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
