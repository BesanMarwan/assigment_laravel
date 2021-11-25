<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->paginate(10);
        return $this->ApiResponse('تم العملية بنجاح', 'categories', CategoryResource::collection($categories), [
            'has_more_page' => $categories->hasMorePages(),
            'main_page' => true
        ]);
    }
}
