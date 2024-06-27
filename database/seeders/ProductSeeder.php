<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $categories = DB::table('categories')->pluck('id')->toArray();
        $brands = DB::table('brands')->pluck('id')->toArray();

        foreach (range(1, 50) as $index) {
            DB::table('products')->insert([
                'product' => $faker->word,
                'description' => $faker->sentence,
                'image' => 'products/default.jpg',
                'price' => $faker->randomFloat(2, 10, 1000),
                'inventory' => $faker->numberBetween(1, 100),
                'category_id' => $faker->randomElement($categories),
                'brand_id' => $faker->randomElement($brands),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
