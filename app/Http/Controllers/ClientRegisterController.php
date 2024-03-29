<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientLoginRequest;
use App\Http\Requests\ClientRegisterRequest;
use App\Http\Requests\formMessage;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Mail\MailClientActive;
use App\Models\ClientRegister;
use App\Models\Contact;
use App\Models\Order;
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
                'alert' => 'Login fail,your email or your password is not correct',

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
    $Login = Auth::guard('client')->user();
    if($Login){

        return view('homepage.page.contact');
    }else{
        Toastr()->info('You must login ');
        return redirect('/loginClient');
    }
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

    public function viewInfor(){
        return view('homepage.page.my_infor');
    }

    public function getDataInfor(){
        $user = Auth::guard('client')->user();
        $data = ClientRegister::where("id", $user->id)
                                ->select("first_name", "last_name", "phone_number", "email", "address", "city", "male", "id")
                                ->first();
        return response()->json([
            'data' => $data
        ]);
    }

    public function updateInfor(UpdateUserRequest $request) {
        $user = Auth::guard('client')->user();

        if($user){
            $data = ClientRegister::find($user->id);
            $data->first_name           = $request->first_name;
            $data->last_name              = $request->last_name;
            $data->phone_number    = $request->phone_number;
            $data->email            = $request->email;
            $data->address            = $request->address;
            $data->city            = $request->city;
            $data->male            = $request->male;
            $data->save();
            return response()->json(['status' => 1]);
        }else{
            return response()->json(['status' => 0]);
        }
    }

    public function viewUpdatePass(){
        return view('homepage.page.update_pass');
    }
    public function updatePass(UpdatePasswordRequest $request) {
        $user = Auth::guard('client')->user();

        if($user){
            $check = Auth::guard('client')->attempt([
                'email'         => $user->email,
                'password'      => $request->old_password
            ]);
            if($check){
                $data = ClientRegister::find($user->id);
                $data->password = bcrypt($request->password);
                $data->save();
                return response()->json(['status' => 1]);
            }else{
                return response()->json(['status' => 2]);
            }
        }else{
            return response()->json(['status' => 0]);
        }
    }
    public function viewTransaction(){
        $user = Auth::guard('client')->user();
        $orders = Order::where("client_id", $user->id)->get();
                    // ->where("order_details.cart_status" , 0)
                    // ->join("order_details", "order_details.order_id", "orders.id");
        return view('homepage.page.view_transaction', compact('orders'));
    }
}
