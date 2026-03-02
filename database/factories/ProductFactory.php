<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Category;

/**
 * @extends Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    public function definition(): array
    {
        $title = $this->faker->unique()->words(3, true);

        return [
            'title' => ucfirst($title),
            'slug' => Str::slug($title),
            'description' => $this->faker->paragraph(2),
            'price' => $this->faker->randomFloat(2, 10, 2000),
            'discount_percentage' => $this->faker->randomFloat(2, 0, 30),
            'stock' => $this->faker->numberBetween(0, 500),
            'file_path' => 'products/' . $this->faker->image('public/storage/products', 640, 480, null, false),
            'is_active' => $this->faker->boolean(90),

            // relation
            'category_id' => Category::factory(),
        ];
    }
}
