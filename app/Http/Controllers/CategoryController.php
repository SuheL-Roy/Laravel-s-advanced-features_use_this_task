<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category_store(Request $request)
    {
        $data = new Category();
        $data->name = $request->category_name;
        $data->save();
        return redirect()->back()->with('success','Category created');
    }
}
