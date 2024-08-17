<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    // In your Reservation model
// In Reservation model
protected $fillable = ['user_id', 'reservation_time', 'number_of_guests', 'special_requests', 'status'];

    protected $casts = [
        'reservation_time' => 'datetime', // Casting as datetime
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
