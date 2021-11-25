<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class CategoriesController extends Controller
{
    public function index(Request $request){

        $categories = Category::select('id','name')->orderBy('categories.id', 'DESC')->paginate(5);
        if($request->ajax()){
            return view('admin.pages.categories.subs.table',compact('categories'));
        }
        return view('admin.pages.categories.index',compact('categories'));

    }

    public function store(CategoriesRequest $request){
        try {

            $category              = new Category();
            $category->name        = ['en'=>$request->name_en ,'ar'=>$request->name];
            $category->slug        =str::slug($request->name_en);
            $category->save();
            if (! $category)
                return response()->json([
                    'status' => false,
                    'error' => __('category.add-error'),
                ]);

            return response()->json([
                'status' => true,
                'success' => __('category.add-success'),
            ]);
    }   catch (\Exception $e){
            return response()->json([
                'status' => false,
                'error' => $e->getMessage(),
            ]);
        }
}

    public function show(Request $request,$id){

        if($request->ajax()) {
            $category = Category::whereId($id)->first();
            return response()->json($category);
        }
    }

    public function update(CategoriesRequest $request){
        try {
            $category = Category::whereId($request->id)->first();
            if (!$category)
                return response()->json([
                    'status' => false,
                    'error' => __('category.unfound'),
                ]);

            $category->update([
                'name'          => ['en'=>$request->name_en ,'ar'=>$request->name],
                'slug'          =>str::slug($request->name_en),
            ]);

            return response()->json([
                'status'  => true,
                'success' => __('category.update-success'),
            ]);

        }catch (\Exception $e){
            return response()->json([
                'status' => false,
                'error' => $e->getMessage(),
            ]);
        }
    }



    public function delete(Request $request)
    {
        try {
            $category = Category::findOrFail($request->id);
            if (!$category) {
                return response()->json([
                    'status' => false,
                    'error' => __('category.delete-error')
                ]);
            }
            $category->delete();
            return response()->json([
                'status' => true,
                'success' => __('category.delete-success'),
            ]);

        } catch (\Exception $exception) {
            return response()->json([
                'status' => false,
                'error' => $exception->getMessage(),
            ]);
        }
    }

}

