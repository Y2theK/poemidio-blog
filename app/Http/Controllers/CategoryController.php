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
    public function index()
    {
        $categories = Category::latest()->get();
        return view('categories.index', compact('categories'));
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
        $category->user_id = auth()->id();
       
        $category->save();
        return back();
    }
    public function delete(Category $category)
    {
        $category->delete();
        return back();
    }
}
