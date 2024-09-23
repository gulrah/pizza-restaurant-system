<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'image',
        'discount_percentage',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
     public function getDiscountedPriceAttribute()
     {
         if ($this->discount_percentage > 0) {
             return $this->price - ($this->price * ($this->discount_percentage / 100));
         }
         return $this->price;
     }
}
