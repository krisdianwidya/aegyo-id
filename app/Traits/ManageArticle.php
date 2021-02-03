<?php

namespace App\Traits;

use App\Models\Article;
use Illuminate\Http\Request;


trait ManageArticle
{
    public function getAllArticles()
    {
        return Article::all();
    }

    public function insertNewArticle(Request $request)
    {
        Article::create([
            'category_id' => $request->articlecategory,
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content
        ]);
    }

    public function updateArticle(Request $request, Article $article)
    {
        $article->update([
            'category_id' => $request->articlecategory,
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content
        ]);
    }

    // public function deleteCategory(Category $category)
    // {
    //     $category->delete();
    // }
}
