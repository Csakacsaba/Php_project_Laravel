<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();

        $numberOfProducts = 25;

        $categories = ['Electronics', 'Clothing', 'Accessories'];

        $faker = \Faker\Factory::create();

        for ($i = 1; $i <= $numberOfProducts; $i++) {
            Product::create([
                'title' => $faker->words(3, true),
                'description' => $faker->paragraph,
                'image' => 'image' . $i . '.jpg',
                'category' => $categories[$i % count($categories)],
                'quantity' => rand(1, 100),
                'price' => rand(100, 1000),
                'discount' => rand(0, 20),
            ]);
        }
    }
}
