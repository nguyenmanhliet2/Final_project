<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientLoginRequest;
use App\Models\ClientRegister;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ClientRegisterController extends Controller
{
    public function indexClientRegister(){

        return view('page.Client.clientRegister');
    }
    public function createClientAccount(Request $request)
    {

        $newClient = $request->all();
        $newClient['hash'] = Str::uuid();
        $newClient['password'] = bcrypt($newClient['password']);
        ClientRegister::create($newClient);
        return response()->json([
            'status' => true,
            'message' => "Add Client account successfully"
        ]);
    }
    public function loginClient(){
        return view('page.Client.clientLogin');
    }

    public function actionClientLogin(ClientLoginRequest $request)
    {
        $admin = Auth::guard('client')->attempt($request->all());

        return response()->json([
            'status' => true,
            'message' => "Register successfully"
        ]);
    }

    public function logoutClient()
    {
        Auth::guard('client')->logout();

        return redirect('/indexHomePage');
    }

}
