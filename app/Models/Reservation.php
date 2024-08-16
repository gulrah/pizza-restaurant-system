<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'user_id',
        'reservation_time',
        'number_of_guests',
        'special_requests',
        'status'  // Now 'status' and 'user_id' are mass-assignable
    ];
}