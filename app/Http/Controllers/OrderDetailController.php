<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddToCartRequest;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class OrderDetailController extends Controller
{
    public function indexCart()
    {
        return view('homepage.page.cart');
    }

    public function addToCart(AddToCartRequest $request){
        // Phải kiểm tra xem là đã login hay chưa?
        $client = Auth::guard('client')->user();
        if($client) {
            $product = Product::find($request->product_id);

            $orderDetail = OrderDetail::where('product_id', $request->product_id)
                                            ->where('cart_status', 1)
                                            ->where('client_id', $client->id)
                                            ->first();
            if($orderDetail) {
                $orderDetail->quantity_product += $request->quantity_product;
                $orderDetail->save();
            } else {
                OrderDetail::create([
                    'product_id'        => $product->id,
                    'name_product'      => $product->name_product,
                    'unit_price'        => $product->sales_price_product ? $product->sales_price_product : $product->price_product,
                    'quantity_product'  => $request->quantity_product,
                    'cart_status'       => 1,
                    'client_id'         => $client->id,
                ]);
            }

            return response()->json(['status' => true]);
        } else {
            return response()->json(['status' => false]);
        }
    }


    public function addToCartUpdate(AddToCartRequest $request){
        $client = Auth::guard('client')->user();
        if($client) {
            $product = Product::find($request->product_id);

            $orderDetail = OrderDetail::where('product_id', $request->product_id)
                                            ->where('cart_status', 1)
                                            ->where('client_id', $client->id)
                                            ->first();
            if($orderDetail) {
                $orderDetail->quantity_product = $request->quantity_product;
                $orderDetail->save();
            } else {
                OrderDetail::create([
                    'product_id'        => $product->id,
                    'name_product'      => $product->name_product,
                    'unit_price'        => $product->sales_price_product ? $product->sales_price_product : $product->price_product,
                    'quantity_product'  => $request->quantity_product,
                    'cart_status'       => 1,
                    'client_id'         => $client->id,
                ]);
            }

            return response()->json(['status' => true]);
        } else {
            return response()->json(['status' => false]);
        }
    }

    public function removeCart(Request $request)
    {
        $client = Auth::guard('client')->user();
        if($client) {
            $orderDetail = OrderDetail::where('cart_status', 1)
                                            ->where('client_id', $client->id)
                                            ->where('product_id', $request->product_id)
                                            ->first();
            $orderDetail->delete();
        }
    }

    public function dataCart()
    {
        $client = Auth::guard('client')->user();
        if($client) {
            $data = OrderDetail::join('products', 'order_details.product_id', 'products.id')
                                  ->where('client_id', $client->id)
                                  ->where('cart_status', 1)
                                  ->select('order_details.*', 'products.image_product')
                                  ->get();
            return response()->json(['data' => $data]);
        }
    }
}
