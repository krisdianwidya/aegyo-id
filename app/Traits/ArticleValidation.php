<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

trait ArticleValidation
{
    public function validateArticle(Request $request)
    {
        return Validator::make($request->all(), [
            'articlecategory' => 'required',
            'title' => 'required|min:3',
            'description' => 'required|min:5',
            'content' => 'required|min:10'
        ]);
    }
}
