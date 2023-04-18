<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HomePageController extends Controller
{
    public function indexHomePage()
    {
        $config  = Config::latest()->first();
        $sql = "SELECT *, (`price_product` - `sales_price_product`) / `price_product` * 100 AS `TYLE` FROM `products` ORDER BY TYLE DESC";
        $allProduct = DB::select($sql);
        return view('homepage.page.homepage', compact('config', 'allProduct'));
    }
    public function viewDetailProduct($id)
    {
        while(strpos($id, 'post')) {
            $position = strpos($id, 'post');
            $id = Str::substr($id, $position + 4);
        }
        $productDetail = Product::find($id);
        $allProduct = Product::where('id_product_catalog', $productDetail->id_product_catalog)->get();
        if($productDetail) {
            return view('homepage.page.productdetail', compact('productDetail', 'allProduct'));
        } else {
            return redirect('/indexHomePage');
        }
    }
    public function viewCategory($id)
    {
        $category = Category::find($id);
        if($category) {
            // Nếu là danh mục con
            if($category->id_category_root > 0) {
                $productDetail = Product::where('status_product', 1)
                                  ->where('id_product_catalog', $category->id)
                                  ->get();
            } else {
                // Nó là danh mục cha. Tìm toàn bộ danh mục con
                $productCatalog = Category::where('id_category_root', $category->id)
                                            ->get();
                $list   = $category->id;
                foreach($productCatalog as $key => $value) {
                    $list = $list . ',' . $value->id;
                }
                $productDetail = Product::whereIn('id_product_catalog', explode(",", $list))->get();
            }

            return view('homepage.page.product', compact('productDetail'));
        }
    }
    public function searchHomePage(Request $request) {
        $config  = Config::latest()->first();
        $nameProduct = $request->nameProduct;
        $search_product = Product::where('name_product', 'like', '%' . $request->nameProduct .'%')->get();

        return view('homepage.page.searchproduct', compact('search_product','config'));
    }
}
