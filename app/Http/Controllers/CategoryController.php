<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Traits\CategoryValidation;
use App\Traits\ManageCategory;

class CategoryController extends Controller
{
    use CategoryValidation;
    use ManageCategory;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->getAllCategories();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validateCategory($request);
        if ($validator->fails()) {
            return redirect('categories/create')
                ->withErrors($validator)
                ->withInput();
        }
        $this->insertNewCategory($request);

        return redirect(route('categories.index'))->with('message', 'New category inserted succesfully');
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
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $validator = $this->validateCategory($request);
        if ($validator->fails()) {
            return redirect('categories/' . $category->id . '/edit')
                ->withErrors($validator)
                ->withInput();
        }

        $this->updateCategory($request, $category);

        return redirect(route('categories.index'))->with('message', 'Category updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect(route('categories.index'))->with('message', 'Category deleted succesfully');
    }
}
