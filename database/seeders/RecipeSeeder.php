<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::all();

        foreach ($products as $product) {
            switch ($product->category->id) {
                case 1:
                    $pizzaIngrIds = range(1,10);
                    shuffle($pizzaIngrIds);
                    for ($i = 0; $i < rand(6,10); $i++) {
                        $randomIngrId = array_shift($pizzaIngrIds);
                        DB::table('recipes')->insert([
                            'product_id' => $product->id,
                            'ingredient_id' => $randomIngrId,
                        ]);
                    }
                    break;
                case 2:
                    $drinksIngrIds = range(11,20);
                    shuffle($drinksIngrIds);
                    for ($i = 0; $i < rand(2,4); $i++) {
                        $randomIngrId = array_shift($drinksIngrIds);
                        DB::table('recipes')->insert([
                            'product_id' => $product->id,
                            'ingredient_id' => $randomIngrId,
                        ]);
                    }
                    break;
                case 3:
                    $dessetsIngrIds = range(21,30);
                    shuffle($dessetsIngrIds);
                    for ($i = 0; $i < rand(2,4); $i++) {
                        $randomIngrId = array_shift($dessetsIngrIds);
                        DB::table('recipes')->insert([
                            'product_id' => $product->id,
                            'ingredient_id' => $randomIngrId,
                        ]);
                    }
                    break;
                case 4:
                    $saucesIngrIds = range(31,40);
                    shuffle($saucesIngrIds);
                    for ($i = 0; $i < rand(1,3); $i++) {
                        $randomIngrId = array_shift($saucesIngrIds);
                        DB::table('recipes')->insert([
                            'product_id' => $product->id,
                            'ingredient_id' => $randomIngrId,
                        ]);
                    }
                    break;
                default:
                    break;
            }
        }
    }
}
