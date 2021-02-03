<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\CategoryValidation;
use App\Traits\ManageCategory;

class ApiCategoryController extends Controller
{
    use CategoryValidation;
    use ManageCategory;

    public function index()
    {
        $categories = $this->getAllCategories();
        return response()->json($categories, 200);
    }

    public function store(Request $request)
    {
        $validator = $this->validateCategory($request);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $this->insertNewCategory($request);

        return response()->json(['message' => 'New category inserted succesfully'], 200);
    }
}
