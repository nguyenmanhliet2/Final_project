<?php

namespace App\Http\Controllers;

use App\Models\baiviet;
use App\Models\comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BaivietController extends Controller
{
    public function adminBlogIndex()
    {
        return view('page.Admin.blog.indexBlog');
    }

    public function indexShowallbaiViet()
    {
        $data = baiviet::join('admin_registers' , 'baiviets.id_nguoi_viet', 'admin_registers.id')
                              ->where('admin_registers.block' , 0)
                              ->where('admin_registers.active' , 1)
                              ->select('baiviets.*' , 'admin_registers.last_name' , 'admin_registers.email')
                              ->get();
        if(count($data) <= 0){
            return response()->json([
                'st' =>false,
                'mess' =>'Data is not exist!',
            ]);
        }else{
            return response()->json([
                'st'=>true,
                'data' =>$data,

            ]);
        }
    }
    public function latestPost()
    {
        $last  = baiviet::latest()->take(5)->get();
        return response()->json([
            'lastestPost' =>$last,
        ]);
    }


    public function indexBaiviet($id_bai_viet)  //show bài viet có id cu thê , co cả thông tin nguơờ viet
    {
        $dataPost = baiviet::join('admin_registers' , 'baiviets.id_nguoi_viet', 'admin_registers.id')
                            ->where('admin_registers.block' , 0)
                            ->where('admin_registers.active' , 1)
                            ->where('baiviets.id' , $id_bai_viet)
                            ->select('baiviets.*' , 'admin_registers.last_name' , 'admin_registers.email')
                            ->get();
        $dataComment = comments::join('baiviets' , 'comments.id_post' , 'baiviets.id')
                            ->where('comments.id_post', $id_bai_viet)->select('baiviets.*' , 'comments.*')
                            ->get();
                            $countCmt = count($dataComment);
        return response()->json([
            'status' => true,
            'data' => $dataPost,
            'dataCMT'=> $dataComment,
            'countcmt' =>  $countCmt

        ]);
            // dd($dataComment->toArray());


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
            $Login = Auth::guard('admin')->user();  //kiểm tra admin có đăng nhập không
            if($Login){
                $data = $request->all();
                $data['content']   = $request->content;
                $data['id_nguoi_viet']   =  Auth::guard('admin')->id(); //nếu admin nào đang đăng nhập id_nguoi_viet lưu bằng id admin đang đăng nhập
                $data['title']   = $request->title;
                $data['hinh_anh']   = $request->hinh_anh;
                baiviet::create($data);

                //tạo bài viết

                return response()->json([
                    'status' => true,
                    'message' => 'đã tạo thành công bài viết',
                ]);
            }else{
                return redirect()->back(); //không đăng nhập trả về trang hiện tại
            }

    }



    public function DeleteAllBaiViet($id)
    {
        $data = baiviet::find($id);
        $data->delete();
        return response()->json([
           'status'  => true,
           'message' => "Delete Sucessfully!"
        ]);
    }

}
