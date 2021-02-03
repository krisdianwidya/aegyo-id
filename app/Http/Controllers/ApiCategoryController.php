<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return response()->json($categories, 200);
    }

    public function store(Request $request)
    {


        Validator::make($request->all(), [
            'category' => 'required|min:3'
        ])->validate();

        // $validator = $request->validate([
        //     'category' => 'required|min:3',
        // ]);

        // if ($validator->fails()) {
        //     return response()->json($validator->errors());
        // }

        // Category::create([
        //     'name' => $request->category
        // ]);

        // return response()->json(['message' => 'success'], 200);
    }
}
