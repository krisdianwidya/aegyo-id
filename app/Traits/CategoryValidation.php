<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

trait CategoryValidation
{
    public function validateCategory(Request $request)
    {
        return Validator::make($request->all(), [
            'category' => 'required|min:3'
        ]);
    }
}
