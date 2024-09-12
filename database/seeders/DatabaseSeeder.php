<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Product;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         $faker = Faker::create();

          User::updateOrCreate([
            'email' => 'admin@example.com'
        ], [
            'name' => $faker->name,
            'password' => bcrypt('password'),
            'admin' => 1,
        ]);

          User::updateOrCreate([
            'email' => 'user@example.com'
        ], [
            'name' => $faker->name,
            'password' => bcrypt('password'),
            'admin' => 0,
        ]);

        Category::updateOrCreate([
            'title' => $faker->word,
        ], [
            'slug' => $faker->slug,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Category::updateOrCreate([
            'title' => $faker->word,
        ], [
            'slug' => $faker->slug,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create or update products
        Product::updateOrCreate([
            'name' => $faker->unique()->word,
        ], [
            'description' => $faker->sentence,
            'price' => $faker->randomFloat(2, 10, 100), // random price between 10 and 100
            'image' => $faker->imageUrl, // random image URL
            'in_stock' => $faker->boolean,
            'category_id' => 1, // Assign to a specific category
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Product::updateOrCreate([
            'name' => $faker->word,
        ], [
            'description' => $faker->sentence,
            'price' => $faker->randomFloat(2, 10, 100), 
            'image' => $faker->imageUrl, 
            'in_stock' => $faker->boolean,
            'category_id' => 2, 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
