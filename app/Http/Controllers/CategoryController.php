<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\CategoryCreateRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        return view('categories.index', compact('categories'));
    }
    public function create(CategoryCreateRequest $request)
    {
        if (auth()->user()->cannot('category-create')) {
            abort(403, 'Access Denied');
        }
        $category = new Category();
        $category->create($request->validated() + ['user_id' => auth()->id()]);
        return redirect()->route('categories.index')->with('info', 'Category Created Successfully..!');
    }
    public function delete(Category $category)
    {
        if (Gate::denies('category-delete', $category)) {
            abort('403', 'Unauthorized');
        }
        $category->delete();
        return redirect()->route('categories.index')->with('info', 'Category Deleted Successfully..!');
    }
}
