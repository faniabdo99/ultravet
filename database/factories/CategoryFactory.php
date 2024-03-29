<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Category::class;
    public function definition()
    {
        return [
            'title' => fake()->sentence(2),
            'slug' => fake()->slug(),
            'order_num' => fake()->numberBetween(1,10),
            'is_featured' => fake()->boolean,
            'pet_id' => 1,
            'user_id' => 1,
            'is_parent' => true
        ];
    }
}
