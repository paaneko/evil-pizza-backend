<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ToppingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $toppings = [
            // Pizzas
            [
                'name' => 'Cheese',
                'extra_price' => 100, // $1.00
                'extra_weight' => 50, // 50 grams
                'thumbnail' => 'cheese.jpg',
            ],
            [
                'name' => 'Pepperoni',
                'extra_price' => 150, // $1.50
                'extra_weight' => 30, // 30 grams
                'thumbnail' => 'pepperoni.jpg',
            ],
            [
                'name' => 'Mushrooms',
                'extra_price' => 75, // $0.75
                'extra_weight' => 40, // 40 grams
                'thumbnail' => 'mushrooms.jpg',
            ],
            [
                'name' => 'Onions',
                'extra_price' => 50, // $0.50
                'extra_weight' => 25, // 25 grams
                'thumbnail' => 'onions.jpg',
            ],
            [
                'name' => 'Bell Peppers',
                'extra_price' => 80, // $0.80
                'extra_weight' => 35, // 35 grams
                'thumbnail' => 'bell_peppers.jpg',
            ],
            [
                'name' => 'Olives',
                'extra_price' => 90, // $0.90
                'extra_weight' => 45, // 45 grams
                'thumbnail' => 'olives.jpg',
            ],
            [
                'name' => 'Tomatoes',
                'extra_price' => 70, // $0.70
                'extra_weight' => 30, // 30 grams
                'thumbnail' => 'tomatoes.jpg',
            ],
            [
                'name' => 'Bacon',
                'extra_price' => 200, // $2.00
                'extra_weight' => 50, // 50 grams
                'thumbnail' => 'bacon.jpg',
            ],
            [
                'name' => 'Ham',
                'extra_price' => 180, // $1.80
                'extra_weight' => 40, // 40 grams
                'thumbnail' => 'ham.jpg',
            ],
            [
                'name' => 'Pineapple',
                'extra_price' => 120, // $1.20
                'extra_weight' => 30, // 30 grams
                'thumbnail' => 'pineapple.jpg',
            ],
            // Drinks
            [
                'name' => 'Ice',
                'extra_price' => 0, // No additional cost
                'extra_weight' => 0, // No additional weight
                'thumbnail' => 'ice.jpg',
            ],
            [
                'name' => 'Lemon Slice',
                'extra_price' => 20, // $0.20
                'extra_weight' => 5, // 5 grams
                'thumbnail' => 'lemon_slice.jpg',
            ],
            [
                'name' => 'Mint Leaves',
                'extra_price' => 30, // $0.30
                'extra_weight' => 2, // 2 grams
                'thumbnail' => 'mint_leaves.jpg',
            ],
            [
                'name' => 'Strawberry',
                'extra_price' => 50, // $0.50
                'extra_weight' => 10, // 10 grams
                'thumbnail' => 'strawberry.jpg',
            ],
            [
                'name' => 'Lime Wedge',
                'extra_price' => 25, // $0.25
                'extra_weight' => 5, // 5 grams
                'thumbnail' => 'lime_wedge.jpg',
            ],
            [
                'name' => 'Orange Slice',
                'extra_price' => 40, // $0.40
                'extra_weight' => 8, // 8 grams
                'thumbnail' => 'orange_slice.jpg',
            ],
            // Desserts
            [
                'name' => 'Chocolate Sauce',
                'extra_price' => 50, // $0.50
                'extra_weight' => 20, // 20 grams
                'thumbnail' => 'chocolate_sauce.jpg',
            ],
            [
                'name' => 'Caramel Sauce',
                'extra_price' => 60, // $0.60
                'extra_weight' => 25, // 25 grams
                'thumbnail' => 'caramel_sauce.jpg',
            ],
            [
                'name' => 'Strawberries',
                'extra_price' => 80, // $0.80
                'extra_weight' => 30, // 30 grams
                'thumbnail' => 'strawberries.jpg',
            ],
            [
                'name' => 'Bananas',
                'extra_price' => 70, // $0.70
                'extra_weight' => 40, // 40 grams
                'thumbnail' => 'bananas.jpg',
            ],
            [
                'name' => 'Whipped Cream',
                'extra_price' => 40, // $0.40
                'extra_weight' => 15, // 15 grams
                'thumbnail' => 'whipped_cream.jpg',
            ],
            [
                'name' => 'Sprinkles',
                'extra_price' => 30, // $0.30
                'extra_weight' => 10, // 10 grams
                'thumbnail' => 'sprinkles.jpg',
            ],
            [
                'name' => 'Nuts',
                'extra_price' => 90, // $0.90
                'extra_weight' => 35, // 35 grams
                'thumbnail' => 'nuts.jpg',
            ],
            [
                'name' => 'Oreo Crumbs',
                'extra_price' => 50, // $0.50
                'extra_weight' => 20, // 20 grams
                'thumbnail' => 'oreo_crumbs.jpg',
            ],
            [
                'name' => 'Mint Leaves',
                'extra_price' => 30, // $0.30
                'extra_weight' => 5, // 5 grams
                'thumbnail' => 'mint_leaves.jpg',
            ],
            [
                'name' => 'Gummy Bears',
                'extra_price' => 70, // $0.70
                'extra_weight' => 25, // 25 grams
                'thumbnail' => 'gummy_bears.jpg',
            ],
            // Sauces
            [
                'name' => 'Garlic Parmesan',
                'extra_price' => 150, // $1.50
                'extra_weight' => 30, // 30 grams
                'thumbnail' => 'garlic_parmesan.jpg',
            ],
            [
                'name' => 'Spicy Marinara',
                'extra_price' => 100, // $1.00
                'extra_weight' => 25, // 25 grams
                'thumbnail' => 'spicy_marinara.jpg',
            ],
            [
                'name' => 'Buffalo',
                'extra_price' => 120, // $1.20
                'extra_weight' => 35, // 35 grams
                'thumbnail' => 'buffalo.jpg',
            ],
            [
                'name' => 'BBQ',
                'extra_price' => 130, // $1.30
                'extra_weight' => 30, // 30 grams
                'thumbnail' => 'bbq.jpg',
            ],
            [
                'name' => 'Ranch',
                'extra_price' => 110, // $1.10
                'extra_weight' => 25, // 25 grams
                'thumbnail' => 'ranch.jpg',
            ],
            [
                'name' => 'Pesto',
                'extra_price' => 140, // $1.40
                'extra_weight' => 35, // 35 grams
                'thumbnail' => 'pesto.jpg',
            ],
            [
                'name' => 'Honey Mustard',
                'extra_price' => 130, // $1.30
                'extra_weight' => 30, // 30 grams
                'thumbnail' => 'honey_mustard.jpg',
            ],
            [
                'name' => 'Teriyaki',
                'extra_price' => 160, // $1.60
                'extra_weight' => 40, // 40 grams
                'thumbnail' => 'teriyaki.jpg',
            ],
            [
                'name' => 'Creamy Garlic',
                'extra_price' => 140, // $1.40
                'extra_weight' => 30, // 30 grams
                'thumbnail' => 'creamy_garlic.jpg',
            ],
            [
                'name' => 'Marinara',
                'extra_price' => 90, // $0.90
                'extra_weight' => 25, // 25 grams
                'thumbnail' => 'marinara.jpg',
            ],
        ];

        DB::table('toppings')->insert($toppings);
    }
}
