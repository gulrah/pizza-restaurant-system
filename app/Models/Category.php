<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Specify the table name if it's not 'categories'
    protected $table = 'categories';

    // Specify the fillable fields
    protected $fillable = [
        'name', // Name of the category
    ];

    // Define the relationship to MenuItem
    public function menuItems()
    {
        return $this->hasMany(MenuItem::class);
    }
}
