<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Product;
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
            'email' => 'ianreeves19981@gmail.com'
        ], [
            'name' => 'Ian Test',
            'password' => bcrypt('password'),
            'admin' => 1,
        ]);

           User::updateOrCreate([
            'email' => 'me@michaelhoughton.com'
        ], [
            'name' => 'Michael Houghton',
            'password' => bcrypt('password'),
            'admin' => 1,
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
            'name' => $faker->word,
        ], [
            'description' => $faker->sentence,
            'price' => $faker->randomFloat(2, 10, 100), // random price between 10 and 100
            'qty' => $faker->numberBetween(1, 10), // random quantity between 1 and 10
            'image' => $faker->imageUrl, // random image URL
            'in_stock' => $faker->boolean,
            'basket_id' => null, // Assuming basket_id and order_id are nullable
            'order_id' => null,
            'category_id' => 1, // Assign to a specific category
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Product::updateOrCreate([
            'name' => $faker->word,
        ], [
            'description' => $faker->sentence,
            'price' => $faker->randomFloat(2, 10, 100), // random price between 10 and 100
            'qty' => $faker->numberBetween(1, 10), // random quantity between 1 and 10
            'image' => $faker->imageUrl, // random image URL
            'in_stock' => $faker->boolean,
            'basket_id' => $faker->optional()->randomDigitNotNull, // random non-null basket_id or null
            'order_id' => $faker->optional()->randomDigitNotNull, // random non-null order_id or null
            'category_id' => 2, // Assign to another specific category
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
