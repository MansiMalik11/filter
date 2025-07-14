<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Faker\Factory as Faker;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 20) as $index) {
            Product::create([
                'name' => $faker->word(),
                'description' => $faker->sentence(),
                'size_id' => rand(1, 3),  // Make sure size with ID 1–3 exists
                'color_id' => rand(1, 3), // Make sure color with ID 1–3 exists
            ]);
        }    }
}
