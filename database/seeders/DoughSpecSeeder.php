<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DoughSpecSeeder extends Seeder
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
                    for($i = 0; $i < 2; $i++) {
                        $extra_price2 = round($product->old_price / 100 * 20);
                        $extra_weight2 = round($product->weight / 100 * 30);
                        DB::table('dough_specs')->insert([
                            'product_id' => $product->id,
                            'name' => ['Thin', 'Classic'][$i],
                            'extra_price' =>  [0, $extra_price2][$i],
                            'extra_weight' => [0, $extra_weight2][$i],
                        ]);
                    }
                    break;
                default:
                    break;
            }
        }
    }
}
