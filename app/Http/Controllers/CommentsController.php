<?php

namespace App\Http\Controllers;

use App\Http\Requests\cmts;
use App\Models\comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yoeunes\Toastr\Facades\Toastr;

class CommentsController extends Controller
{

    public function taocmt(cmts $request)
    {
        $Login = Auth::guard('client')->user();
        if($Login){
            $data = $request->all();
            $data['noi_dung_cmt']   = $request->noi_dung_cmt;
            $data['id_user']   =  Auth::guard('client')->id();
            $data['name_user']   =  Auth::guard('client')->user()->last_name; //nếu admin nào đang đăng nhập id_nguoi_viet lưu bằng id admin đang đăng nhập
             //nếu admin nào đang đăng nhập id_nguoi_viet lưu bằng id admin đang đăng nhập
            $data['id_post']   = $request->id_post;
            comments::create($data);
             return response()->json([
                'status' =>true,
             ]);
        }
    }
    public function xoaCmt($id){
        $Login = Auth::guard('client')->user();
        if($Login){
            $id_user =  Auth::guard('client')->id();
            $data = comments::where('id_user' ,  $id_user)->where('id' ,$id)->first();
            if($data){
                $data->delete();
                return response()->json([
                    'status' => true,
                 ]);
            }else{
                return response()->json([
                    'status' => false,
                 ]);
            }
        }
    }
    public function getid($id){
        $Login = Auth::guard('client')->user();
        if($Login){
            $id_user =  Auth::guard('client')->id();
            $data =comments::where('id_user' ,  $id_user)->where('id' ,$id)->first();
            return response()->json([
                'status' => $data,
                'alert'=> "200",
             ]);
        }
    }
    public function editCmt($id , Request $requets){
        $Login = Auth::guard('client')->user();
        if($Login){
            $id_user =  Auth::guard('client')->id();
            $data = comments::where('id_user' ,  $id_user)->where('id' ,$id)->first();
            if($data){
                $updatecmt = $requets->all();
                $updatecmt['noi_dung_cmt'] =  $requets->noi_dung_cmt;
                $data->update($updatecmt);
                return response()->json([
                    'status' => true,
                    'alert'=> "200",
                 ]);
            }else{
                return response()->json([
                    'status' => false,
                 ]);
            }
        }
    }

}
