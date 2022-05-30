<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'product_name' => 'Jeju Volcanic Lava Impurity Removing Gel Scrub',
            'product_description' => 'A daily, oil-type gel nose scrub with volcanic and plant-derived ingredients from Jeju island that absorbs excess oil and dissolves impurities!',
            'product_image' => 'images/jeju-removing-gel.PNG',
            'product_price' => 150000,
            'product_stock' => 10
        ]);
        DB::table('products')->insert([
            'product_name' => 'Yehwadam Plum Flower Revitalizing Toner',
            'product_description' => 'A refreshing toner that preps and hydrates skin! Contains skin-friendly hydrating ingredients (Betaine, Trehalose) for long-lasting moisture.',
            'product_image' => 'images/plum-toner.PNG',
            'product_price' => 125000,
            'product_stock' => 5
        ]);
        DB::table('products')->insert([
            'product_name' => 'Product 3',
            'product_description' => 'This is the product description',
            'product_image' => 'images/placeholder.png',
            'product_price' => 150000,
            'product_stock' => 10
        ]);
        DB::table('products')->insert([
            'product_name' => 'Product 4',
            'product_description' => 'This is the product description',
            'product_image' => 'images/placeholder.png',
            'product_price' => 150000,
            'product_stock' => 10
        ]);
        DB::table('products')->insert([
            'product_name' => 'Product 5',
            'product_description' => 'This is the product description',
            'product_image' => 'images/placeholder.png',
            'product_price' => 150000,
            'product_stock' => 10
        ]);
        DB::table('products')->insert([
            'product_name' => 'Product 6',
            'product_description' => 'This is the product description',
            'product_image' => 'images/placeholder.png',
            'product_price' => 150000,
            'product_stock' => 10
        ]);
        DB::table('products')->insert([
            'product_name' => 'Product 7',
            'product_description' => 'This is the product description',
            'product_image' => 'images/placeholder.png',
            'product_price' => 150000,
            'product_stock' => 10
        ]);
        DB::table('products')->insert([
            'product_name' => 'Product 8',
            'product_description' => 'This is the product description',
            'product_image' => 'images/placeholder.png',
            'product_price' => 150000,
            'product_stock' => 10
        ]);
        DB::table('products')->insert([
            'product_name' => 'Product 9',
            'product_description' => 'This is the product description',
            'product_image' => 'images/placeholder.png',
            'product_price' => 150000,
            'product_stock' => 10
        ]);
        DB::table('products')->insert([
            'product_name' => 'Product 10',
            'product_description' => 'This is the product description',
            'product_image' => 'images/placeholder.png',
            'product_price' => 150000,
            'product_stock' => 10
        ]);
    }
}
