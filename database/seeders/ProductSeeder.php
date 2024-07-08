<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Product::create(['name' => 'Product 1', 'description' => 'Description 1', 'price' => 10.00]);
        Product::create(['name' => 'Product 2', 'description' => 'Description 2', 'price' => 20.00]);
        Product::create(['name' => 'Product 3', 'description' => 'Description 3', 'price' => 30.00]);
    }
}
