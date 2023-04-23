<?php

namespace App\Http\Controllers;

use App\Models\AdminRegister;
use App\Models\ClientRegister;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AdminRegisterController extends Controller
{
    public function indexAdminRegister()
    {
        return view('page.Admin.adminRegister');
    }

    public function createAdminAccount(Request $request)
    {

        $newAdmin = $request->all();
        $newAdmin['hash'] = Str::uuid();
        $newAdmin['password'] = bcrypt($newAdmin['password']);
        AdminRegister::create($newAdmin);
        return response()->json([
            'status' => true,
            'message' => "Add admin account successfully"
        ]);
    }

    public function recieveAdmin(Request $request)
    {
        $admin_data = AdminRegister::where('block', 0)->get();
        return response()->json([
            'newData' => $admin_data,
        ]);
    }
    public function updateAdmin(Request $request)
    {
        $newUpdateAdmin = $request->all();
        $newUpdateAdmin = AdminRegister::where('id', $request->id)->first();
        $newUpdateAdmin->update($newUpdateAdmin);
        return response()->json([
            'updateAdminData' => true,
        ]);
    }
    public function removeAdmin(Request $request)
    {
        $deleteAdminData = AdminRegister::where('id', $request->id)->first()->delete();
        return response()->json([
            'deleteAdminStatus' => true,
            'deleteMessage' => 'Delete Admin Successfully'
        ]);
    }

    public function loginAdmin()
    {
        return view('page.Admin.adminLogin');
    }

    public function actionLogin(Request $request)
    {
        $admin = Auth::guard('admin')->attempt($request->all());

        return response()->json([
            'status' => true,
            'message' => "Register successfully"
        ]);
    }

    public function logoutAdmin(){
        $Login = Auth::guard('admin')->user();
        if($Login){
            Auth::guard('admin')->logout();

            return redirect('/admin/category/index');
        }else{
            Toastr()->info('You must login ');
            return redirect('/loginAdmin');
        }
    }

    public function userManagement()
    {
        return view('page.client.clientManagement');
    }
    public function loadUser(){
         $data = ClientRegister::all();
         return response()->json([
            'datauser'=>$data
         ]);
    }

    public function userBlocked($id)
    {
        $data = ClientRegister::find($id);
        if ($data) {
            $data->block = !$data->block;
            $data->save();
            return response()->json([
                'alert' => true,
                'actionBlock' => $data->block
            ]);
        }else{
            return response()->json([
                'alert' => 'ko tồn tại người dùng',
            ]);
        }
    }

    public function userActive($id)
    {
        $data = ClientRegister::find($id);
        if ($data) {
            $data->active = !$data->active;
            $data->save();
            return response()->json([
                'alert' => true,
                'Actived' => $data->active

            ]);
        }else{
            return response()->json([
                'alert' => 'ko tồn tại người dùng',
            ]);
        }
    }

    public function userDelete($id)
    {
        $data = ClientRegister::find($id);
        if ($data) {
            $data->delete();
            $data->save();
            return response()->json([
                'alert' => true,
            ]);
        }else{
            return response()->json([
                'alert' => 'ko tồn tại người dùng',
            ]);
        }
    }
    public function searchEmail(Request $request)
    {
        $nameEmail = $request->email;
        $data = ClientRegister::where('email', 'like', '%' .   $request->email .'%')->get();

        return response()->json(['dataEmail' => $data]);
    }

    public function contactManagement()
    {
        return view('page.client.contact');
    }
    public function loadContact()
    {
        $data = Contact::all();
        return response()->json([
            'dataContact'=>$data
        ]);



    }
    public function contactDelete($id)
    {
        $data = Contact::find($id);
        if($data){
            $data->delete();
            $data->save();
            return response()->json([
                'alert'=> 'deleted!'
            ]);
        }
    }
}
