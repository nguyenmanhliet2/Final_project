<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientLoginRequest;
use App\Http\Requests\ClientRegisterRequest;
use App\Http\Requests\formMessage;
use App\Mail\MailClientActive;
use App\Models\ClientRegister;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ClientRegisterController extends Controller
{
    public function indexClientRegister(){
        $Login = Auth::guard('client')->user();
        if($Login){
            return redirect('/indexHomePage');
        }else{
            return view('page.Client.clientRegister');
        }
    }
    public function createClientAccount(ClientRegisterRequest $request)
    {

        $newClient = $request->all();
        $newClient['hash'] = Str::uuid();
        $newClient['password'] = bcrypt($newClient['password']);
        $newClient['hash_email'] =
        ClientRegister::create($newClient);
        Mail::to($request->email)->send(new MailClientActive(
            $request->last_name,
            $newClient['hash'],
            'Kích Hoạt Tài Khoản Đăng Ký',
        ));
        return response()->json([
            'status' => 200,
            'message' => "chúng tôi đã gửi mail thành công, vui check mail của bạn để kích hoạt tài khoản!"
        ]);
    }
    public function loginClient(){
        $Login = Auth::guard('client')->user();
        if($Login){
            return redirect('/indexHomePage');
        }else{
            return view('page.Client.clientLogin');
        }

    }

    public function actionClientLogin(ClientLoginRequest $request)
    {
        $input  = $request->all();
        $check = Auth::guard('client')->attempt($input);
        if ($check) {
            $Login = Auth::guard('client')->user();
            if ($Login->active) {
                return response()->json([
                    'status' => 2,
                    'alert' => 'Login Done!',
                ]);
            } else {
                Auth::guard('client')->logout();
                return response()->json([
                    'status' => 1,
                    'alert' => 'Account is not active or has been Locked',
                ]);
            }
        } else {
            return response()->json([
                'status' => 0,
                'alert' => 'dang nhap that bai,mat khau hoac email khong chinh xac',

            ]);
        }
    }

    public function logoutClient()
    {
        $Login = Auth::guard('client')->user();
        if($Login){
            Auth::guard('client')->logout();

            return redirect('/indexHomePage');
        }else{
            Toastr()->info('You must login ');
            return redirect('/loginClient');
        }

    }

    public function createContact(formMessage $request)
    {
        $Login = Auth::guard('client')->user();
       if($Login){
        $data = $request->all();
        $data['your_name'] =Auth::guard('client')->user()->last_name;
        $data['your_email'] = Auth::guard('client')->user()->email;
        $data['your_phone_number'] = Auth::guard('client')->user()->phone_number;
        $data['message'] = $request->message;

        Contact::create($data);
        return response()->json([
            'status' => 200,
            'message' => "thank you for your contact!"
        ]);
       }
    }
    public function contactPage()
    {
        return view('homepage.page.contact');
    }


    public function active($hash){
        $activeCl = ClientRegister::where('hash', $hash)->first();
        if($activeCl->active) {
            toastr()->warning('Tài khoản của bạn đã được kích hoạt trước đó!');
        } else {
            $activeCl->active = 1;
            $activeCl->save();
            toastr()->success('Tài khoản của bạn đã được kích hoạt!');
        }
        return redirect('/loginClient');
    }
}
