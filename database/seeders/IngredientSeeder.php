<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ingredients = [
            // Pizzas
            ['name' => 'Cheese', 'required' => true],
            ['name' => 'Pepperoni', 'required' => false],
            ['name' => 'Mushrooms', 'required' => true],
            ['name' => 'Onions', 'required' => false],
            ['name' => 'Bell Peppers', 'required' => true],
            ['name' => 'Olives', 'required' => false],
            ['name' => 'Tomatoes', 'required' => true],
            ['name' => 'Bacon', 'required' => false],
            ['name' => 'Ham', 'required' => true],
            ['name' => 'Pineapple', 'required' => false],
            // Drinks
            ['name' => 'Lemon', 'required' => true],
            ['name' => 'Lime', 'required' => false],
            ['name' => 'Mint Leaves', 'required' => true],
            ['name' => 'Ginger', 'required' => false],
            ['name' => 'Honey', 'required' => true],
            ['name' => 'Orange', 'required' => false],
            ['name' => 'Strawberry', 'required' => true],
            ['name' => 'Watermelon', 'required' => false],
            ['name' => 'Cucumber', 'required' => true],
            ['name' => 'Coconut Water', 'required' => false],
            // Desserts
            ['name' => 'Chocolate', 'required' => true],
            ['name' => 'Vanilla', 'required' => false],
            ['name' => 'Strawberries', 'required' => true],
            ['name' => 'Bananas', 'required' => false],
            ['name' => 'Caramel', 'required' => true],
            ['name' => 'Whipped Cream', 'required' => false],
            ['name' => 'Nuts', 'required' => true],
            ['name' => 'Sprinkles', 'required' => false],
            ['name' => 'Oreo Cookies', 'required' => true],
            ['name' => 'Peanut Butter', 'required' => false],
            // Sauces
            ['name' => 'Marinara', 'required' => false],
            ['name' => 'Alfredo', 'required' => true],
            ['name' => 'Barbecue', 'required' => true],
            ['name' => 'Pesto', 'required' => false],
            ['name' => 'Buffalo', 'required' => true],
            ['name' => 'Ranch', 'required' => true],
            ['name' => 'Garlic', 'required' => false],
            ['name' => 'Honey', 'required' => true],
            ['name' => 'Teriyaki', 'required' => false],
            ['name' => 'Pepper', 'required' => true],
        ];

        DB::table('ingredients')->insert($ingredients);
    }
}
