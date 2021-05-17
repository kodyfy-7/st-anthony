<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_name' => $this->faker->unique()->word,
            'product_description' => $this->faker->sentence(50),
            'product_price' => 500,
            'quantity_stock' => 100,
            'product_status' => 1,
            'product_slug' => $this->faker->unique()->word,
            'product_image_path' => 'images/6o6qnpCJv8Lh13OWI4ajMu5LwT97Xsl1wxObDQgn.jpg',
            'brand_id' => 1,
            'category_id' => 1,
        ];
    }

}
