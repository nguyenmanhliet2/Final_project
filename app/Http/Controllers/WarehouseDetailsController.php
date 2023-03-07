<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\WarehouseDetails;
use App\Models\WarehouseInvoices;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WarehouseDetailsController extends Controller
{
   public function indexWarehouseDetail(){
    return view('page.warehouseDetail.indexWarehouseDetail');
   }

   public function recieveProduct()
   {
        $product = Product::where('status_product', 1)->get();
        return response()->json([
            'newData' => $product,
        ]);
   }

   public function createDetail(Request $request)
   {
        $data = $request->all();
        $tang_soluong = WarehouseDetails::join('warehouse_invoices', 'warehouse_details.id_warehouse_invoice', 'warehouse_invoices.id')
                                        ->where('warehouse_details.id_product', $request->id)
                                        ->where('warehouse_invoices.status', 0)
                                        ->select('warehouse_details.*')
                                        ->first();
        if($tang_soluong){
            $tang_soluong->input_quantity = $tang_soluong->input_quantity + 1;
            $tang_soluong->save();
        }else{
            $find_warehouse_invoices = WarehouseInvoices::where('status', 0)->first();
            if(!$find_warehouse_invoices){
                $warehouse_invoices = WarehouseInvoices::latest()->first();
                if($warehouse_invoices){
                    $data['order_code'] =  1000 + $warehouse_invoices->id;
                }else{
                    $data['order_code'] =  1000;
                }

                $data['hash'] = Str::uuid();

                $warehouse = WarehouseInvoices::create($data);
                WarehouseDetails::create([
                    'id_product' => $request->id,
                    'name_product' => $request->name_product,
                    'id_warehouse_invoice' => $warehouse->id,
                    'input_quantity' => 1,
                    'input_price' => 0,
                ]);
            }else{
                WarehouseDetails::create([
                    'id_product' => $request->id,
                    'name_product' => $request->name_product,
                    'id_warehouse_invoice' => $find_warehouse_invoices->id,
                    'input_quantity' => 1,
                    'input_price' => 0,
                ]);
            }
        }

        return response()->json([
            'status' => 1,
        ]);

   }

   public function recieveDetail()
   {
    $data = WarehouseDetails::join('warehouse_invoices', 'warehouse_details.id_warehouse_invoice', 'warehouse_invoices.id')
                            ->where('warehouse_invoices.status', 0)
                            ->select('warehouse_details.*')
                            ->get();

    return response()->json([
        'newDataDetail' => $data,
    ]);
   }

   public function plusQuantity(Request $request)
   {
        $WarehouseDetails = WarehouseDetails::find($request->id);
        $WarehouseDetails->input_quantity = $request->input_quantity;
        $WarehouseDetails->input_price = $request->input_price;
        $WarehouseDetails->save();
   }
}
