<?php

namespace Database\Factories;

use App\Models\Pet;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pet>
 */
class PetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Pet::class;
    public function definition()
    {
        return [
            'title' => fake()->sentence(2),
            'slug' => fake()->slug(),
            'is_featured' => fake()->boolean,
            'user_id' => 1,
            'image' => '/storage/placeholder.png'
        ];
    }
}
