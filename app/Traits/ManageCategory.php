<?php

namespace App\Traits;

use App\Models\Category;

trait ManageCategory
{
    public function getAllCategories()
    {
        return Category::all();
    }
}
