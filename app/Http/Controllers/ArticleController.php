<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
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
        $this->validate($request, [
            'articlecategory' => 'required',
            'title' => 'required|min:3',
            'description' => 'required|min:5',
            'content' => 'required|min:10',
        ]);

        Article::create([
            'category_id' => $request->articlecategory,
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content
        ]);

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
        $categories = Category::all();
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
        $this->validate($request, [
            'articlecategory' => 'required',
            'title' => 'required|min:3',
            'description' => 'required|min:5',
            'content' => 'required|min:10',
        ]);

        $article->update([
            'category_id' => $request->articlecategory,
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content
        ]);

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
        $article->delete();

        return redirect(route('articles.index'))->with('message', 'Article deleted succesfully');
    }
}
