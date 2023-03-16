<?php

namespace App\Http\Controllers;

use App\Models\AdminRegister;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class AdminRegisterController extends Controller
{
    public function indexAdminRegister(){
        return view('page.Admin.adminRegister');
    }
    public function createAdminAccount(Request $request){

        $newAdmin = $request->all();
        $newAdmin['hash'] = Str::uuid();
        $newAdmin['password'] = bcrypt($newAdmin['password']);
        AdminRegister::create($newAdmin);
        return response()->json([
            'status' => true,
            'message' => "Add admin account successfully"
        ]);
    }
    public function loginAdmin(){
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

    public function indexHomePage()
    {
        return view('homepage.page.homepage');
    }
}
