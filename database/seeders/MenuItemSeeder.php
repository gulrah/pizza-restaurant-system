<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    \App\Models\MenuItem::create([
        'name' => 'Margherita Pizza',
        'description' => 'Classic Margherita with fresh mozzarella and basil',
        'price' => 9.99,
        'image' => 'path/to/image.jpg'
    ]);
    // Add more items similarly
}

}
