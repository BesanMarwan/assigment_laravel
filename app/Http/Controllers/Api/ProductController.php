<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Traits\ApiResponse;

class ProductController extends Controller
{
    use ApiResponse;

    //show all products
    public function index(){
        $products=Product::orderBy('created_at','desc')->paginate(5);
        return $this->ApiResponse('تم العملية بنجاح','products',ProductResource::collection($products),[
            'has_more_page'=>$products->hasMorePages(),
            'main_page'=>true
        ]);
    }

    //show details particular products
    public function showProduct($id){

        $product=Product::whereId($id)->first();
        if(! $product)
            return response()->json(['success'  =>false,'message' =>'هذا المنتج غير موجود',]);

        return response()->json(['success'  =>true,'message' =>'تم العملية بنجاح','product' => $product]);
        //        return $this->ApiResponse('تم العملية بنجاح','product',ProductResource::collection($product),[],[]);
    }

    //filter products by category id
    public function showProductsCategory($id){
        $products=Product::orderBy('created_at','desc')->where('category_id',$id)->paginate(5);
        return $this->ApiResponse('تم العملية بنجاح','products',ProductResource::collection($products),[
            'has_more_page'=>$products->hasMorePages(),
            'main_page'=>true
        ]);
    }

    //filter products by priceDesc
    public function sortPriceDesc(){
        $products=Product::orderBy('price','desc')->paginate(5);

        return $this->ApiResponse('تم العملية بنجاح','products',ProductResource::collection($products),[
            'has_more_page'=>$products->hasMorePages(),
            'main_page'=>true
        ]);
    }

    //filter products by priceAsc
    public function sortPriceAsc(){
        $products=Product::orderBy('price','asc')->paginate(5);
        return $this->ApiResponse('تم العملية بنجاح','products',ProductResource::collection($products),[
            'has_more_page'=>$products->hasMorePages(),
            'main_page'=>true
        ]);
    }
}
