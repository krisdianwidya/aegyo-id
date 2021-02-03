<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ArticleValidation;
use App\Traits\ManageArticle;

class ApiArticleController extends Controller
{
    use ArticleValidation;
    use ManageArticle;

    public function index()
    {
        $articles = $this->getAllArticles();
        return response()->json($articles, 200);
    }

    public function store(Request $request)
    {
        $validator = $this->validateArticle($request);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $this->insertNewArticle($request);

        return response()->json(['message' => 'New article inserted succesfully'], 200);
    }
}
