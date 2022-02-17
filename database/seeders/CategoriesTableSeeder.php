<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'id' => 1,
            'name' => 'Hiburan'
        ]);

        Category::create([
            'id' => 2,
            'name' => 'Pendidikan'
        ]);

        Category::create([
            'id' => 3,
            'name' => 'Politik'
        ]);

        Category::create([
            'id' => 4,
            'name' => 'Kesehatan'
        ]);

        
        Category::create([
            'id' => 5,
            'name' => 'Kriminal'
        ]);
    }
}
