<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subCategories = [
            [
                'name' => 'Meat',
            ],
            [
                'name' => 'Seafood',
            ],
            [
                'name' => 'Vegetarian',
            ],
            [
                'name' => 'New York-style',
            ],
            [
                'name' => 'Beer',
            ],
            [
                'name' => 'Wine',
            ],
            [
                'name' => 'Spirits',
            ],
            [
                'name' => 'Cocktails',
            ],
            [
                'name' => 'Biscuits',
            ],
            [
                'name' => 'Cakes',
            ],
            [
                'name' => 'Chocolates',
            ],
            [
                'name' => 'Pastries',
            ],
            [
                'name' => 'Cream',
            ],
            [
                'name' => 'Gravy',
            ],
            [
                'name' => 'Barbecue',
            ],
            [
                'name' => 'Pesto',
            ],
        ];

        DB::table('sub_categories')->insert($subCategories);
    }
}
