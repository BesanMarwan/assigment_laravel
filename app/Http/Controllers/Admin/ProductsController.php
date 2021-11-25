<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Variant;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Str;

class ProductsController extends Controller
{
    public function index(Request $request){
        $products = Product::leftJoin('categories','categories.id','=','products.category_id')
                    ->select([
                       'products.*',
                       'categories.name as category_name'
                    ])->orderBy('id', 'DESC')->withTrashed()
                      ->paginate(4);
        $categories =Category::select('id','name')->get();
        if($request->ajax()){
            return view('admin.pages.products.subs.table',compact('products'));
        }
        return view('admin.pages.products.index',compact('products','categories'));
    }
    public function store(ProductRequest $request){
      try {
            $product              = new Product();
            $product->name        = ['en'=>$request->name_en ,'ar'=>$request->name];
            $product->slug        =str::slug($request->name_en);
            $product->description = ['en'=>$request->description_en , 'ar'=>$request->description];
            $product->category_id =$request->category;
            $product->price       =$request->price;
            $product->quantity	  =$request->qty;

            if($request->hasFile('file'))
                $product->image_path=uploadImage('products',$request->file('file'));
            $product->save();
            if (! $product)
                return response()->json([
                    'status' => false,
                    'error' => __('product.add-error')
                ]);

            return response()->json([
                'status' => true,
                'success' => __('product.add-success'),
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
            $product = Product::withTrashed()->whereId($id)->first();
            return response()->json($product);
        }
    }
    public function activate(Request $request){
        $product =Product::withTrashed()->whereId($request->id)->restore();

        return response()->json([
            'status' => true,
            'success' => __('product.activate-message'),
        ]);
    }
    public function update(ProductRequest $request){
        try {
            $product = Product::withTrashed()->whereId($request->id)->first();
            if (!$product)
                return response()->json([
                    'status' => false,
                    'error' => __('product.unfound'),
                ]);

            $product->update([
                'name'          => ['en'=>$request->name_en ,'ar'=>$request->name],
                'description'   => ['en'=>$request->description_en ,'ar'=>$request->description],
                'slug'          =>str::slug($request->name_en),
                'category_id'   =>$request->category,
                'price'         =>$request->price,
                'quantity'      =>$request->qty,
            ]);
            if($request->hasFile('file')) {
                $file=uploadImage('products',$request->file('file'));
                $product->update(['image_path'=>$file]);
            }
            return response()->json([
                'status'  => true,
                'success' => __('product.update-success'),
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
            $product = Product::findOrFail($request->id);
            if (!$product) {
                return response()->json([
                    'status' => false,
                    'error' => __('product.unfound'),
                ]);
            }
            /// to delete image from folder
//            if($product->image_path != null) {
//                $image = public_path($product->image_path);
//                unlink($image);
//            }

            $product->delete();
            return response()->json([
                'status' => true,
                'success' =>__('product.delete-success'),
            ]);

        } catch (\Exception $exception) {
            return response()->json([
                'status' => false,
                'error' => $exception->getMessage(),
            ]);
        }
    }

}
