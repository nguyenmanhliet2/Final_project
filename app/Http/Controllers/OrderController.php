<?php

namespace App\Http\Controllers;

use App\Mail\successPay;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use PHPUnit\Util\Xml\SuccessfulSchemaDetectionResult;

class OrderController extends Controller
{

    public function store()
    {
        $client = Auth::guard('client')->user();
        if ($client) {
            $cart = OrderDetail::where('cart_status', 1)->where('client_id', $client->id)->get();
            if (count($cart) > 0) {

                $order = Order::create([
                    'order_code'             => "HD" . Str::uuid(),
                    'total_price'            => 0,
                    'sales_price_product'    => 0,
                    'real_price'             => 0,
                    'client_id'              => $client->id,
                    'payment_type'           => 1,
                ]);
                $real_price = 0;
                $total_price = 0;
                foreach ($cart as $key => $value) {
                    $product = Product::find($value->product_id);
                    if ($product) {
                        $priceProduct        =  $product->sales_price_product ? $product->sales_price_product : $product->price_product;
                        $real_price         +=  $value->quantity_product * $priceProduct;
                        $total_price        +=  $value->quantity_product * $product->price_product;
                        $value->unit_price   =  $priceProduct;
                        $value->cart_status  = 0;
                        $value->order_id     = $order->id;
                        $value->save();
                    } else {
                        $value->delete();
                    }
                }
                $order->real_price  = $real_price;
                $order->total_price = $total_price;
                $order->sales_price_product  = $total_price - $real_price;
                $order->save();
                Mail::to($client->email)->send(new successPay(
                    $client->last_name,
                    $real_price,
                    $order->order_code,
                    $client->phone_number,

                ));
                return response()->json(['status' => true]);
            } else {
                return response()->json(['status' => 2]);
            }
        }
        return response()->json(['status' => false]);
    }

    public function allOrderdata(){
            $data = Order::join('client_registers' ,  'orders.client_id' , 'client_registers.id')->select('orders.*','client_registers.last_name','client_registers.email')->get();
            return response()->json([
                'dataOrder'=>$data,
            ]);
    }
    public function orderDetailLoad($id){
          $data = OrderDetail::where('order_id' ,$id)->get();
          return response()->json([
               'dataDetail'=>$data
          ]);
    }
    public function orderDetailDelete($id){
        $data = Order::find($id);
        $data->delete();

        return response()->json([
             'alert'=>'Delete Successfully!',
        ]);
  }
}
