<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'date', 'time_slot', 'table_number', 'people_count', 'special_requests'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
