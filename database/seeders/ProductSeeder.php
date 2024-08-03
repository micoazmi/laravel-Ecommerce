<?php

namespace Database\Seeders;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'name' => 'Monitor 175hz Asus',
            'description' => 'Monitor 175hz Asus Rog Zephyrus',
            'price' => 3000000
        ]);

        Product::create([
            'name' => 'Webcam Mtech F9-23',
            'description' => 'Webcam Mtech F9-23 new arrival',
            'price' => 250000
        ]);

        Product::create([
            'name' => 'Macbook air M2',
            'description' => 'Macbook air M2 garansi ibox',
            'price' => 22000000
        ]);
    }
}
