<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Js;

class ProductController extends Controller
{
   public function indexNewProduct(){
    return view('page.Category.indexProduct');
   }
   public function productStore(Request $request){
    $newUserDataStore = $request->all();
    Product::create($newUserDataStore);
    return response()->json([
        'status' => true,
        'message' => "Add product successfully"
    ]);
   }
   public function receiveProductData(Request $request) {
    $product_data = Product::get();
    return response()->json([
        'newData' => $product_data,
    ]);
   }
}
