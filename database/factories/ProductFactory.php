<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory{
    protected $model = Product::class;
    public function definition(){
        return [
            'title' => fake()->sentence,
            'slug' => fake()->slug,
            'status' => 'available',
            'image' => '/storage/placeholder.png',
            'sku' => fake()->uuid,
            'description' => fake()->sentence(15),
            'price' => rand(5,50),
            'content' => fake()->realText(1000),
            'qty' => rand(1,10),
            'brand_id' => rand(1,3),
            'category_id' => rand(1,3),
            'pet_id' => rand(1,3),
            'is_featured' => fake()->boolean,
            'user_id' => 1
        ];
    }
}
