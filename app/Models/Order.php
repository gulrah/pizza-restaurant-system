<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'product_name', 'quantity', 'total', 'status'];

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Other model methods...
}
