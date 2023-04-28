<?php

namespace App\Http\Controllers;

use App\Models\WarehouseDetails;
use App\Models\WarehouseInvoices;
use Illuminate\Http\Request;

class WarehouseInvoicesController extends Controller
{
   public function indexWarehouseInvoice() {
        return view('page.WarehouseInvoice.indexWarehouseInvoice');
   }
//    public function indexWarehouseInvoiceStore(Request $request) {
//         $newInvoice = $request->all();
//         WarehouseInvoices::create($newInvoice);
//         return response()->json ([
//             'status' => true,
//             'message' => 'Add Invoice Successfully!',
//         ]);
//    }
//    public function recieveWarehouseInvoice(Request $request) {
//         $invoice_data = WarehouseInvoices::get();
//         return response()->json([
//             'newData' => $invoice_data,
//         ]);
//    }
//    public function updateWarehouseInvoice(Request $request) {
//         $newInvoiceUpdate = $request->all();
//         $invoiceUpdateData = WarehouseInvoices::where('id', $request->id)->first();
//         $invoiceUpdateData->update($newInvoiceUpdate);
//         return response()->json([
//             'updateInvoiceStatus' => true,
//         ]);
//    }
//    public function removeWarehouseInvoice(Request $request){
//         $deleteInvoicedata = WarehouseInvoices::where('id', $request->id)->first()->delete();

//         return response()->json([
//             'deleteInvoiceStatus' => true,

//         ]);
//    }

//    public function dataWarehouseInvoice()
//    {
//     $WarehouseInvoices = WarehouseInvoices::where('status' , 1)->get();
//     return response()->json([
//         'dataWarehouseInvoices' => $WarehouseInvoices,
//     ]);

//    }

//    public function dataDetailWarehouseInvoice($id)
//    {
//         $WarehouseDetails = WarehouseDetails::where('id_warehouse_invoice', $id)->get();

//         return response()->json([
//             'dataDetailWarehouseDetails' => $WarehouseDetails,
//         ]);
//    }

//    public function switchInvoiceStatus(Request $request){
//     $InvoiceEdit = WarehouseInvoices::where('id', $request->id)->first();
//     $InvoiceEdit->payment = !$InvoiceEdit->payment;
//     $InvoiceEdit->save();
//    }
}
