<?php

namespace App\Traits;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

trait ManageCategory
{
    public function getAllCategories()
    {
        return Category::all();
    }

    public function insertNewCategory(Request $request)
    {
        Category::create([
            'name' => $request->category
        ]);
    }
}
