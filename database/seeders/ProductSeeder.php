<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            // Pizzas
            [
                'name' => 'Margherita Pizza',
                'category_id' => 1,
                'sub_category_id' => rand(1, 4),
                'purchases_count' => 50,
                'old_price' => 999, // $9.99
                'new_price' => null, // $7.99
                'weight' => 400, // 400 grams
                'thumbnail' => 'margherita.jpg',
                'slug' => 'margherita-pizza',
                'is_visible' => true,
            ],
            [
                'name' => 'Pepperoni Pizza',
                'category_id' => 1,
                'sub_category_id' => rand(1, 4),
                'purchases_count' => 75,
                'old_price' => 1099, // $10.99
                'new_price' => null, // $8.99
                'weight' => 450, // 450 grams
                'thumbnail' => 'pepperoni.jpg',
                'slug' => 'pepperoni-pizza',
                'is_visible' => true,
            ],
            [
                'name' => 'Vegetarian Pizza',
                'category_id' => 1,
                'sub_category_id' => rand(1, 4),
                'purchases_count' => 30,
                'old_price' => 949, // $9.49
                'new_price' => null, // $7.49
                'weight' => 380, // 380 grams
                'thumbnail' => 'vegetarian.jpg',
                'slug' => 'vegetarian-pizza',
                'is_visible' => true,
            ],
            [
                'name' => 'Supreme Pizza',
                'category_id' => 1,
                'sub_category_id' => rand(1, 4),
                'purchases_count' => 60,
                'old_price' => 1199, // $11.99
                'new_price' => 999, // $9.99
                'weight' => 500, // 500 grams
                'thumbnail' => 'supreme.jpg',
                'slug' => 'supreme-pizza',
                'is_visible' => true,
            ],
            [
                'name' => 'Hawaiian Pizza',
                'category_id' => 1,
                'sub_category_id' => rand(1, 4),
                'purchases_count' => 40,
                'old_price' => 1099, // $10.99
                'new_price' => 899, // $8.99
                'weight' => 450, // 450 grams
                'thumbnail' => 'hawaiian.jpg',
                'slug' => 'hawaiian-pizza',
                'is_visible' => true,
            ],
            [
                'name' => 'Meat Lovers Pizza',
                'category_id' => 1,
                'sub_category_id' => rand(1, 4),
                'purchases_count' => 70,
                'old_price' => 1299, // $12.99
                'new_price' => null, // $10.99
                'weight' => 550, // 550 grams
                'thumbnail' => 'meat-lovers.jpg',
                'slug' => 'meat-lovers-pizza',
                'is_visible' => true,
            ],
            // Drinks
            [
                'name' => 'Coca-Cola',
                'category_id' => 2,
                'sub_category_id' => rand(5, 8),
                'purchases_count' => 45,
                'old_price' => 150,  // $1.50
                'new_price' => null,  // $1.00
                'weight' => 330,     // 330 grams
                'thumbnail' => 'coke_thumbnail.jpg',
                'slug' => 'coca-cola',
                'is_visible' => true,
            ],
            [
                'name' => 'Orange Juice',
                'category_id' => 2,
                'sub_category_id' => rand(5, 8),
                'purchases_count' => 50,
                'old_price' => 250,   // $2.50
                'new_price' => null,   // $2.00
                'weight' => 500,      // 500 grams
                'thumbnail' => 'orange_juice_thumbnail.jpg',
                'slug' => 'orange-juice',
                'is_visible' => true,
            ],
            [
                'name' => 'Sparkling Water',
                'category_id' => 2,
                'sub_category_id' => rand(5, 8),
                'purchases_count' => 80,
                'old_price' => 100,   // $1.00
                'new_price' => null,    // $0.75
                'weight' => 500,      // 500 grams
                'thumbnail' => 'sparkling_water_thumbnail.jpg',
                'slug' => 'sparkling-water',
                'is_visible' => true,
            ],
            [
                'name' => 'Iced Coffee',
                'category_id' => 2,
                'sub_category_id' => rand(5, 8),
                'purchases_count' => 30,
                'old_price' => 300,   // $3.00
                'new_price' => 250,   // $2.50
                'weight' => 355,      // 355 grams
                'thumbnail' => 'iced_coffee_thumbnail.jpg',
                'slug' => 'iced-coffee',
                'is_visible' => true,
            ],
            [
                'name' => 'Lemonade',
                'category_id' => 2,
                'sub_category_id' => rand(5, 8),
                'purchases_count' => 40,
                'old_price' => 200,   // $2.00
                'new_price' => null,   // $1.50
                'weight' => 450,      // 450 grams
                'thumbnail' => 'lemonade_thumbnail.jpg',
                'slug' => 'lemonade',
                'is_visible' => true,
            ],
            [
                'name' => 'Mango Smoothie',
                'category_id' => 2,
                'sub_category_id' => rand(5, 8),
                'purchases_count' => 25,
                'old_price' => 350,   // $3.50
                'new_price' => null,   // $3.00
                'weight' => 500,      // 500 grams
                'thumbnail' => 'mango_smoothie_thumbnail.jpg',
                'slug' => 'mango-smoothie',
                'is_visible' => true,
            ],
            // Desserts
            [
                'name' => 'Chocolate Cake',
                'category_id' => 3,
                'sub_category_id' => rand(9, 12),
                'purchases_count' => 25,
                'old_price' => 1499, // $14.99
                'new_price' => 999, // $9.99
                'weight' => 500, // 500 grams
                'thumbnail' => 'chocolate_cake.jpg',
                'slug' => 'chocolate-cake',
                'is_visible' => true,
            ],
            [
                'name' => 'Strawberry Cheesecake',
                'category_id' => 3,
                'sub_category_id' => rand(9, 12),
                'purchases_count' => 18,
                'old_price' => 1999, // $19.99
                'new_price' => null, // $14.99
                'weight' => 600, // 600 grams
                'thumbnail' => 'strawberry_cheesecake.jpg',
                'slug' => 'strawberry-cheesecake',
                'is_visible' => true,
            ],
            [
                'name' => 'Apple Pie',
                'category_id' => 3,
                'sub_category_id' => rand(9, 12),
                'purchases_count' => 12,
                'old_price' => 1299, // $12.99
                'new_price' => null, // $8.99
                'weight' => 800, // 800 grams
                'thumbnail' => 'apple_pie.jpg',
                'slug' => 'apple-pie',
                'is_visible' => true,
            ],
            [
                'name' => 'Vanilla Ice Cream',
                'category_id' => 3,
                'sub_category_id' => rand(9, 12),
                'purchases_count' => 32,
                'old_price' => 799, // $7.99
                'new_price' => null, // $5.99
                'weight' => 300, // 300 grams
                'thumbnail' => 'vanilla_ice_cream.jpg',
                'slug' => 'vanilla-ice-cream',
                'is_visible' => true,
            ],
            [
                'name' => 'Chocolate Brownie',
                'category_id' => 3,
                'sub_category_id' => rand(9, 12),
                'purchases_count' => 20,
                'old_price' => 1099, // $10.99
                'new_price' => null, // $8.99
                'weight' => 200, // 200 grams
                'thumbnail' => 'chocolate_brownie.jpg',
                'slug' => 'chocolate-brownie',
                'is_visible' => true,
            ],
            [
                'name' => 'Fruit Tart',
                'category_id' => 3,
                'sub_category_id' => rand(9, 12),
                'purchases_count' => 15,
                'old_price' => 1499, // $14.99
                'new_price' => null, // $11.99
                'weight' => 400, // 400 grams
                'thumbnail' => 'fruit_tart.jpg',
                'slug' => 'fruit-tart',
                'is_visible' => true,
            ],
            [
                'name' => 'Mango Sorbet',
                'category_id' => 3,
                'sub_category_id' => rand(9, 12),
                'purchases_count' => 10,
                'old_price' => 899, // $8.99
                'new_price' => 699, // $6.99
                'weight' => 350, // 350 grams
                'thumbnail' => 'mango_sorbet.jpg',
                'slug' => 'mango-sorbet',
                'is_visible' => true,
            ],
            [
                'name' => 'Caramel Flan',
                'category_id' => 3,
                'sub_category_id' => rand(9, 12),
                'purchases_count' => 8,
                'old_price' => 1199, // $11.99
                'new_price' => null, // $9.99
                'weight' => 200, // 200 grams
                'thumbnail' => 'caramel_flan.jpg',
                'slug' => 'caramel-flan',
                'is_visible' => true,
            ],
            [
                'name' => 'Banana Split',
                'category_id' => 3,
                'sub_category_id' => rand(9, 12),
                'purchases_count' => 15,
                'old_price' => 1599, // $15.99
                'new_price' => null, // $12.99
                'weight' => 800, // 800 grams
                'thumbnail' => 'banana_split.jpg',
                'slug' => 'banana-split',
                'is_visible' => true,
            ],
            // Sauces
            [
                'name' => 'Marinara Sauce',
                'category_id' => 4,
                'sub_category_id' => rand(13, 16),
                'purchases_count' => 25,
                'old_price' => 499, // $4.99
                'new_price' => null, // $3.99
                'weight' => 500, // 500 grams
                'thumbnail' => 'marinara_sauce.jpg',
                'slug' => 'marinara-sauce',
                'is_visible' => true,
            ],
            [
                'name' => 'Alfredo Sauce',
                'category_id' => 4,
                'sub_category_id' => rand(13, 16),
                'purchases_count' => 45,
                'old_price' => 599, // $5.99
                'new_price' => null, // $4.99
                'weight' => 450, // 450 grams
                'thumbnail' => 'alfredo_sauce.jpg',
                'slug' => 'alfredo-sauce',
                'is_visible' => true,
            ],
            [
                'name' => 'Barbecue Sauce',
                'category_id' => 4,
                'sub_category_id' => rand(13, 16),
                'purchases_count' => 30,
                'old_price' => 399, // $3.99
                'new_price' => null, // $2.99
                'weight' => 300, // 300 grams
                'thumbnail' => 'barbecue_sauce.jpg',
                'slug' => 'barbecue-sauce',
                'is_visible' => true,
            ],
            [
                'name' => 'Pesto Sauce',
                'category_id' => 4,
                'sub_category_id' => rand(13, 16),
                'purchases_count' => 15,
                'old_price' => 699, // $6.99
                'new_price' => null, // $5.99
                'weight' => 200, // 200 grams
                'thumbnail' => 'pesto_sauce.jpg',
                'slug' => 'pesto-sauce',
                'is_visible' => true,
            ],
            [
                'name' => 'Buffalo Sauce',
                'category_id' => 4,
                'sub_category_id' => rand(13, 16),
                'purchases_count' => 10,
                'old_price' => 349, // $3.49
                'new_price' => 249, // $2.49
                'weight' => 250, // 250 grams
                'thumbnail' => 'buffalo_sauce.jpg',
                'slug' => 'buffalo-sauce',
                'is_visible' => true,
            ],
            [
                'name' => 'Ranch Sauce',
                'category_id' => 4,
                'sub_category_id' => rand(13, 16),
                'purchases_count' => 20,
                'old_price' => 449, // $4.49
                'new_price' => null, // $3.49
                'weight' => 300, // 300 grams
                'thumbnail' => 'ranch_sauce.jpg',
                'slug' => 'ranch-sauce',
                'is_visible' => true,
            ],
            [
                'name' => 'Garlic Sauce',
                'category_id' => 4,
                'sub_category_id' => rand(13, 16),
                'purchases_count' => 35,
                'old_price' => 299, // $2.99
                'new_price' => null, // $1.99
                'weight' => 150, // 150 grams
                'thumbnail' => 'garlic_sauce.jpg',
                'slug' => 'garlic-sauce',
                'is_visible' => true,
            ],
            [
                'name' => 'Honey Mustard Sauce',
                'category_id' => 4,
                'sub_category_id' => rand(13, 16),
                'purchases_count' => 12,
                'old_price' => 499, // $4.99
                'new_price' => 399, // $3.99
                'weight' => 200, // 200 grams
                'thumbnail' => 'honey_mustard_sauce.jpg',
                'slug' => 'honey-mustard-sauce',
                'is_visible' => true,
            ],
            [
                'name' => 'Teriyaki Sauce',
                'category_id' => 4,
                'sub_category_id' => rand(13, 16),
                'purchases_count' => 18,
                'old_price' => 399, // $3.99
                'new_price' => null, // $2.99
                'weight' => 250, // 250 grams
                'thumbnail' => 'teriyaki_sauce.jpg',
                'slug' => 'teriyaki-sauce',
                'is_visible' => true,
            ],
            [
                'name' => 'Hot Sauce',
                'category_id' => 4,
                'sub_category_id' => rand(13, 16),
                'purchases_count' => 22,
                'old_price' => 349, // $3.49
                'new_price' => null, // $2.49
                'weight' => 200, // 200 grams
                'thumbnail' => 'hot_sauce.jpg',
                'slug' => 'hot-sauce',
                'is_visible' => true,
            ],
        ];

        DB::table('products')->insert($products);
    }
}
