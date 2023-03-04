<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'category_name' => 'Triler',
        ]);

        Category::create([
            'category_name' => 'Román',
        ]);
        Category::create([
            'category_name' => 'Sci-fi',
        ]);
        Category::create([
            'category_name' => 'Životopis',
        ]);
        Category::create([
            'category_name' => 'Náučná literatúra',
        ]);
        Category::create([
            'category_name' => 'Detektivka',
        ]);
        Category::create([
            'category_name' => 'Fantasy',
        ]);
    }
}
