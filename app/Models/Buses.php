<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Buses extends Model
{
    

    protected $table = 'buses';
    protected $primaryKey = 'id';

    protected $fillable = [
        'plate_number',
        'capacity',
        'status',
    ];
}
