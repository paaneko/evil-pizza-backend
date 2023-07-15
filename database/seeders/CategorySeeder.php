<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Pizzas',
                'slug' => 'pizzas',
            ],
            [
                'name' => 'Drinks',
                'slug' => 'drinks',
            ],
            [
                'name' => 'Desserts',
                'slug' => 'desserts',
            ],
            [
                'name' => 'Sauce',
                'slug' => 'sauce',
            ]
        ];

        DB::table('categories')->insert($categories);
    }
}
