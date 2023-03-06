<?php

namespace App\Http\Controllers;

use App\Models\WarehouseDetails;
use Illuminate\Http\Request;

class WarehouseDetailsController extends Controller
{
   public function indexWarehouseDetail(){
    return view('page.warehouseDetail.indexWarehouseDetail');
   }
   public function indexWarehouseDetailStore(Request $request){
    $newDetail = $request->all();
    WarehouseDetails::create($newDetail);
    return response()->json([
        'status' => true,
        'message' => 'Add detail successfully',
    ]);
   }
   public function recieveWarehouseDetail(Request $request){
    $detail_data = WarehouseDetails::get();
    return response()->json([
        'newDataDetail' => $detail_data,
    ]);
   }
   public function updateWarehouseDetail(Request $request){

   }
   public function removeWarehouseDetail(Request $request){

   }
}
