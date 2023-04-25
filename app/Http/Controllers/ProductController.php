<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Js;

class ProductController extends Controller
{
   public function indexNewProduct(){
    // return view('page.Category.indexProduct');
    return view('page.Product.indexProduct');
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

   public function receiveCategoryData()
   {
        $category_data = Category::where('is_open', 1)->get();
        return response()->json([
            'newData' => $category_data,
        ]);
   }
   public function switchProductStatus(Request $request) {
        $productEdit = Product::where('id', $request->id)->first();
        $productEdit->status_product = !$productEdit->status_product;
        $productEdit->save();
   }
   public function updateProductData(Request $request) {
    $newDataProDuctUpdate = $request->all();
    $updateProductData = Product::where('id', $request->id)->first();
    $updateProductData->update($newDataProDuctUpdate);
    return response()->json([
       'updateProductStatus' => true,
    ]);
   }
   public function removeProductData(Request $request) {
    $deleteProductData = Product::where('id', $request->id)->first()->delete();
    return response()->json([
        'deleteProductStatus' => true,
        'deleteMessage' => 'Delete Product Successfully'
    ]);
   }
   public function searchProduct(Request $request)
    {
        $nameProduct = $request->nameProduct;
        $data = Product::where('name_product', 'like', '%' . $request->nameProduct .'%')->get();

        return response()->json(['dataProduct' => $data]);
    }
}
