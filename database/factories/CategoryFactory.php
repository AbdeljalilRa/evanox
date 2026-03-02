<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    public function definition(): array
    {
        $title = $this->faker->unique()->words(2, true);

        return [
            'title' => ucfirst($title),
            'sub_title' => $this->faker->sentence(3),
            'slug' => Str::slug($title),
            'description' => $this->faker->paragraph(),
        ];
    }
}
