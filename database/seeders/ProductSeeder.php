<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ProductSeeder extends Seeder
{
    
    public function run()
    {
        for ($i =0; $i < 5; $i++){
            DB::table('products')->insert([
                'product_name' => $faker->word,
                'product_description' => $faker->sentence,
                'product_price' => 500,
                'quantity_stock' => 100,
                'product_status' => 1,
                'product_slug' => $faker->word,
                'product_image_path' => 'images/6o6qnpCJv8Lh13OWI4ajMu5LwT97Xsl1wxObDQgn.jpg',
                'brand_id' => 1,
                'category_id' => 1,
                'sub_category_id' => 1,
            ]);
        }
    }
}
