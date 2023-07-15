<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,

            CategorySeeder::class,
            SubCategorySeeder::class,
            ToppingSeeder::class,
            IngredientSeeder::class,
        ]);

        $this->call([
            ProductSeeder::class,
        ]);

        $this->call([
            SizeSpecSeeder::class,
            DoughSpecSeeder::class,
        ]);

        $this->call([
            RecipeSeeder::class,
            ProductToppingRecipeSeeder::class,
        ]);

    }
}
