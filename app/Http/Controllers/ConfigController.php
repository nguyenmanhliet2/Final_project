<?php

namespace App\Http\Controllers;

use App\Models\Config;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function index()
    {
        $config = Config::latest()->first();
        return view('page.Admin.config.index', compact('config'));
    }
    public function update(Request $request)
    {
        $data = $request->all();

        Config::create($data);
        toastr()->success("Update Configuration Successfully!");

        return redirect()->back();
    }
}
