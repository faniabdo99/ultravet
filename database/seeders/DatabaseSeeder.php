<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Pet;
use App\Models\Product;
class DatabaseSeeder extends Seeder{
    public function run(){
        //Create brands
        Brand::factory(3)->create();
        Category::factory(3)->create();
        Pet::factory(3)->create();
        Product::factory(25)->create();
    }
}
