<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    // The table name is 'reservations' (plural). Laravel assumes this by default.
    protected $table = 'reservations';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'preferred_date',
        'location',
        'tattoo_info',
    ];
}