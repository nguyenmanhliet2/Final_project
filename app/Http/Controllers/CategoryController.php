<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(){
        return view('page.Category.index');
    }

    public function store(Request $request){
        $newData = $request->all();
        Category::create($newData);

        return response()->json([
            'status'  => true,
            'message' => "Add Sucessfully!"
        ]);
    }
    public function receiveData(){
        $categoryData = 'SELECT a.*, b.name_category as id_category_root
        FROM `categories` a LEFT JOIN `categories` b
        on a.id_category_root = b.id';
        $newCategoryData = DB::select($categoryData);
        return response()->json([
            'data' => $newCategoryData,
        ]);
    }
}
