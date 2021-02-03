<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Traits\ArticleValidation;
use App\Traits\ManageArticle;
use App\Traits\ManageCategory;

class ArticleController extends Controller
{
    use ArticleValidation;
    use ManageCategory;
    use ManageArticle;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = $this->getAllArticles();
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->getAllCategories();
        return view('articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validateArticle($request);
        if ($validator->fails()) {
            return redirect('articles/create')
                ->withErrors($validator)
                ->withInput();
        }

        $this->insertNewArticle($request);

        return redirect(route('articles.index'))->with('message', 'New article inserted succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $categories = $this->getAllCategories();
        return view('articles.edit', compact('article', 'categories'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $validator = $this->validateArticle($request);
        if ($validator->fails()) {
            return redirect('articles/' . $article->id . '/edit')
                ->withErrors($validator)
                ->withInput();
        }

        $this->updateArticle($request, $article);

        return redirect(route('articles.index'))->with('message', 'Article updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $this->deleteArticle($article);

        return redirect(route('articles.index'))->with('message', 'Article deleted succesfully');
    }
}
