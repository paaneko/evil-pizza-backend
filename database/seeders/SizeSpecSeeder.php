<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SizeSpecSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // TODO enhance performance and code duplications
        $products = Product::all();

        foreach ($products as $product) {
            switch ($product->category->id) {
                case 1:
                    for ($i = 0; $i < 4; $i++) {
                        DB::table('size_specs')->insert([
                            'product_id' => $product->id,
                            'name' => ['10"', '12"', '14"', '16"'][$i],
                            'extra_price' =>  $this->getSizePrice($i, $product->old_price),
                            'extra_weight' => $this->getSizeWeight($i, $product->weight),
                            // formula: 10% from product price + random [5,10,30,55] penny
                            'extra_toppings_price' => round($product->old_price / 100 * 10) + [5, 10, 30, 55][$i],
                            // formula: 10% from product weight + random [5,10,30,55] gram
                            'extra_toppings_weight_rate' => [0, 30, 50, 75][$i],
                        ]);
                    }
                    break;
                case 2:
                    for ($i = 0; $i < 2; $i++) {
                        DB::table('size_specs')->insert([
                            'product_id' => $product->id,
                            'name' => ['330mL','480mL'][$i],
                            'extra_price' =>  $this->getSizePrice($i, $product->old_price),
                            'extra_weight' => $this->getSizeWeight($i, $product->weight),
                            'extra_toppings_price' => round($product->old_price / 100 * 10) + [15, 25][$i],
                            'extra_toppings_weight_rate' => [0, 25][$i],
                        ]);
                    }
                    break;
                case 3:
                    for ($i = 0; $i < 3; $i++) {
                        DB::table('size_specs')->insert([
                            'product_id' => $product->id,
                            'name' => [0, 150, 350][$i] + $product->weight . 'g',
                            'extra_price' =>  $this->getSizePrice($i, $product->old_price),
                            'extra_weight' => $this->getSizeWeight($i, $product->weight),
                            'extra_toppings_price' => round($product->old_price / 100 * 10)+ [15, 25, 35][$i],
                            'extra_toppings_weight_rate' => [0, 25, 45][$i],
                        ]);
                    }
                    break;
                case 4:
                    DB::table('size_specs')->insert([
                        'product_id' => $product->id,
                        'name' => $product->weight . 'g',
                        'extra_price' =>  0,
                        'extra_weight' => 0,
                        'extra_toppings_price' => round($product->old_price / 100 * 10),
                        'extra_toppings_weight_rate' => 0,
                    ]);
                    break;
                default:
                    break;
            }
        }
    }

    private function getSizePrice(int $index, int $price): int {
        // in percent 👇
        $config = [0, 20, 40, 55];
        return round(($price / 100) * $config[$index]);
    }

    private function getSizeWeight(int $index, int $weight): int {
        // in percent 👇
        $config = [0, 15, 35, 50];
        return round(($weight / 100) * $config[$index]);
    }
}
