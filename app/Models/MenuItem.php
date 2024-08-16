<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory; // Enable if you are using factories for seeders

    protected $fillable = ['name', 'description', 'price', 'image']; // Specify only the fields you want to allow for mass assignment.
    // protected $guarded = []; // Uncomment this if you decide to use guarded instead of fillable.
}
