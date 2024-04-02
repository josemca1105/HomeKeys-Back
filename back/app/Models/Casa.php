<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Casa extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'name',
        'address',
        'price',
        'description',
        'type',
        'n_rooms',
        'n_baths',
        'n_parking',
        'meters',
        'image_1',
        'image_2',
        'image_3',
        'image_4',
        'image_5',
        'image_6',
        'image_7',
        'image_8',
        'image_9',
        'image_10',
        'image_11',
        'image_12',
        'image_13',
        'image_14',
        'image_15',
    ];
}
