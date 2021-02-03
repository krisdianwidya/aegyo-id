<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\ManageCategory;

class ApiCategoryController extends Controller
{
    use ManageCategory;

    public function index()
    {
        $categories = $this->getAllCategories();
        return response()->json($categories, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category' => 'required|min:3'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        Category::create([
            'name' => $request->category
        ]);

        return response()->json(['message' => 'New category inserted succesfully'], 200);
    }
}
