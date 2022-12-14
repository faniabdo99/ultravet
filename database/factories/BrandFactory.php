<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Brand::class;
    public function definition()
    {
        return [
            'title' => fake()->sentence(2),
            'slug' => fake()->slug(),
            'image' => '/storage/placeholder.png'
        ];
    }
}
