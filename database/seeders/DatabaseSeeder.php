<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
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
            'title' => 'Category 1',
        ], [
            'slug' => 'Category 1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

            Category::updateOrCreate([
            'title' => 'Category 2',
        ], [
            'slug' => 'Category 2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Product::updateOrCreate([
            'name' => 'Product 1',
        ], [
            'description' => 'Product 1 Description',
            'price' => '15',
            'qty' => '3',
            'image' => 'https://randomimageul.com',
            'in_stock' => '1',
            'basket_id' => null,
            'order_id' => null,
            'category_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Product::updateOrCreate([
            'name' => 'Product 2',
        ], [
            'description' => 'Product 2 Description',
            'price' => '20',
            'qty' => '5',
            'image' => 'https://randomimageul.com',
            'in_stock' => '1',
            'basket_id' => '1',
            'order_id' => '1',
            'category_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
       
             ]);
    }
}
