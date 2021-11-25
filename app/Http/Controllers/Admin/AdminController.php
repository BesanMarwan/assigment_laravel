<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $categories_count =Category::count();
        $products_count   =Product::count();
        return view('admin.dashboard',compact('categories_count','products_count'));
    }
}
