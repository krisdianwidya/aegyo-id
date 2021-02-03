<?php

namespace App\Traits;

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

    public function updateCategory(Request $request, Category $category)
    {
        $category->update([
            'name' => $request->category
        ]);
    }

    public function deleteCategory(Category $category)
    {
        $category->delete();
    }
}
