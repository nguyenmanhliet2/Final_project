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
    $warehouse_invoices = WarehouseInvoices::where('status', 0)->first();
    if($warehouse_invoices){
        $id_warehouse_invoices = $warehouse_invoices->id;
        return view('page.warehouseDetail.indexWarehouseDetail', compact('id_warehouse_invoices'));
    }else{
        return view('page.warehouseDetail.indexWarehouseDetail');
    }
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
        $increase_quantity = WarehouseDetails::join('warehouse_invoices', 'warehouse_details.id_warehouse_invoice', 'warehouse_invoices.id')
                                        ->where('warehouse_details.id_product', $request->id)
                                        ->where('warehouse_invoices.status', 0)
                                        ->select('warehouse_details.*')
                                        ->first();
        if($increase_quantity){
            $increase_quantity->input_quantity = $increase_quantity->input_quantity + 1;
            $increase_quantity->save();
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
                    'into_price' => 0,
                ]);
            }else{
                WarehouseDetails::create([
                    'id_product' => $request->id,
                    'name_product' => $request->name_product,
                    'id_warehouse_invoice' => $find_warehouse_invoices->id,
                    'input_quantity' => 1,
                    'input_price' => 0,
                    'into_price' => 0,
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
    $totalPrice = WarehouseDetails::join('warehouse_invoices', 'warehouse_details.id_warehouse_invoice', 'warehouse_invoices.id')
                            ->where('warehouse_invoices.status', 0)
                            ->sum('warehouse_details.into_price');
    $totalQuantity = WarehouseDetails::join('warehouse_invoices', 'warehouse_details.id_warehouse_invoice', 'warehouse_invoices.id')
                                    ->where('warehouse_invoices.status', 0)
                                    ->sum('warehouse_details.input_quantity');


    return response()->json([
        'newDataDetail'         => $data,
        'totalPrice'            => $totalPrice,
        'totalQuantity'         => $totalQuantity,
    ]);
   }

   public function plusQuantity(Request $request)
   {
        $WarehouseDetails = WarehouseDetails::find($request->id);
        $WarehouseDetails->input_quantity = $request->input_quantity;
        $WarehouseDetails->input_price = $request->input_price;
        $WarehouseDetails->into_price = $request->input_price * $request->input_quantity;
        $WarehouseDetails->save();
        return response()->json([
            'status'  => 1,
        ]);
   }
   public function removeWarehouseDetail(Request $request) {
    $deleteDetail = WarehouseDetails::where('id', $request->id)->first()->delete();
    return response()->json([
        'deleteDetailStatus' => true,
        'deleteMessage' => 'Delete Detail Successfully'
    ]);
   }

   public function addProductDetail(Request $request)
    {
        $warehouse_invoices = WarehouseInvoices::where('id', $request->id_warehouse_invoices)->first();
        if($warehouse_invoices){
            $warehouse_invoices->update([
                'total_money' => $request->totalPrice,
                'total_amount' => $request->totalQuantity,
                'description' => $request->description,
                'status' => 1,
            ]);
            return response()->json([
                'status' => true,
            ]);

        }
    }

}
