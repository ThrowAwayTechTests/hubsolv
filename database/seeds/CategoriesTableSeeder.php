<?php

use Illuminate\Database\Seeder;
use App\Category;

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
            'title' => 'PHP',
        ]);
        Category::create([
            'title' => 'Javascript',
        ]);
        Category::create([
            'title' => 'Linux',
        ]);
    }
}
