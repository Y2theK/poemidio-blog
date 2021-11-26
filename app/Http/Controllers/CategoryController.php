<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function add()
    {
        return view('categories.add');
    }
    public function create()
    {
        $validator = validator(request()->all(), [
            'name' => 'required',
            
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        $category = new Category();
        $category->name = request()->name;
       
        $category->save();
        return back();
    }
}
