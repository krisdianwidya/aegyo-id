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
}
