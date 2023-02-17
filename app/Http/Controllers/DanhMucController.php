<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;
use Illuminate\Http\Request;

class DanhMucController extends Controller
{
    public function index(){
        return view('page.danh_muc.index');
    }
    public function store(Request $request){
        $newData = $request->all();
    }
}
