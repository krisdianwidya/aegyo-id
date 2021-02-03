<?php

namespace App\Traits;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Traits\ArticleValidation;


trait ManageArticle
{
    public function getAllArticles()
    {
        return Article::all();
    }

    // public function insertNewCategory(Request $request)
    // {
    //     Category::create([
    //         'name' => $request->category
    //     ]);
    // }

    // public function updateCategory(Request $request, Category $category)
    // {
    //     $category->update([
    //         'name' => $request->category
    //     ]);
    // }

    // public function deleteCategory(Category $category)
    // {
    //     $category->delete();
    // }
}
