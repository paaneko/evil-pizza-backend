<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductToppingRecipeSeeder extends Seeder
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
                    $pizzaToppingsIds = range(1,10);
                    shuffle($pizzaToppingsIds);
                    for ($i = 0; $i < rand(7,9); $i++) {
                        $randomIngrId = array_shift($pizzaToppingsIds);
                        DB::table('product_topping_recipes')->insert([
                            'product_id' => $product->id,
                            'topping_id' => $randomIngrId,
                        ]);
                    }
                    break;
                case 2:
                    $drinksToppingsIds = range(11,20);
                    shuffle($drinksToppingsIds);
                    for ($i = 0; $i < rand(3,6); $i++) {
                        $randomIngrId = array_shift($drinksToppingsIds);
                        DB::table('product_topping_recipes')->insert([
                            'product_id' => $product->id,
                            'topping_id' => $randomIngrId,
                        ]);
                    }
                    break;
                case 3:
                    $dessetsToppingsIds = range(21,30);
                    shuffle($dessetsToppingsIds);
                    for ($i = 0; $i < rand(7,9); $i++) {
                        $randomIngrId = array_shift($dessetsToppingsIds);
                        DB::table('product_topping_recipes')->insert([
                            'product_id' => $product->id,
                            'topping_id' => $randomIngrId,
                        ]);
                    }
                    break;
                case 4:
                    $saucesToppingsIds = range(31,40);
                    shuffle($saucesToppingsIds);
                    for ($i = 0; $i < rand(3,5); $i++) {
                        $randomIngrId = array_shift($saucesToppingsIds);
                        DB::table('product_topping_recipes')->insert([
                            'product_id' => $product->id,
                            'topping_id' => $randomIngrId,
                        ]);
                    }
                    break;
                default:
                    break;
            }
        }
    }
}
