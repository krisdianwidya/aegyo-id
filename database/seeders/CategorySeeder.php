<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'k-pop',
            'k-drama',
            'k-beauty',
            'entertaintment',
            'lifestyle'
        ];

        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}
