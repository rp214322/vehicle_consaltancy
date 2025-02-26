<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::select('id', 'name')->get();
        
        return response()->json([
            'message' => 'Categories fetch successfully',
            'data' => $categories
        ], 200);
    }
}
