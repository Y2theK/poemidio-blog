<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Gate as FacadesGate;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','detail','home']);
    }
    public function home()
    {
        return view('articles.home');
    }
    public function index()
    {
        // return view('articles/index'); or
       
        if (request()->has('user')) {
            $data = Article::where('user_id', auth()->user()->id)->get();
            $name = auth()->user()->name;
        } else {
            $data = Article::latest()->get();
            $name = "";
        }
       
        
       
        return view('articles.index', [
            "articles" => $data,
            "name" => "$name"
           
        ]);
    }
    public function detail($id)
    {
        $data = Article::find($id);
        return view('articles.detail', [
            "article" => $data
        ]);
    }
    public function delete($id)
    {
        $data = Article::find($id);
        if (FacadesGate::denies('edit-delete-post', $data)) {
            return back()->with('error', 'Unauthorized Attempt');
        }
        $data->delete();
        return redirect('/articles')->with('info', 'Article Deleted');
    }
    public function add()
    {
        $data = Category::all();
        return view('articles.add', [
            'categories' => $data
        ]);
    }
    public function create()
    {
        $validator = validator(request()->all(), [
            'title' => 'required',
            'body' => 'required',
            'description' => 'required',
            'category_id' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        $article = new Article;
        $article->title = ucwords(request()->title);
        $article->body = request('body');
        $article->description = request('description');
        $article->user_id = auth()->user()->id;
        $article->category_id = request('category_id');
        $article->save();
        return redirect('/articles')->with('info', 'Article Created');
    }
    public function edit($id)
    {
        $article = Article::find($id);
        $categories = Category::all();
        if (FacadesGate::allows('edit-delete-post', $article)) {
            return view('articles.edit', [
                "article" => $article,
                "categories" => $categories
            ]);
        } else {
            return back()->with('error', 'Unauthorized Attempt');
        }
    }
    public function update($id)
    {
        $article = Article::find($id);

        
        $article->title = request('title');
        $article->body = request('body');
        $article->description = request('description');
        $article->category_id = request('category_id');
        $article->save();
        return redirect("/articles/detail/{$id}")->with('info', 'Article Updated');
    }
}
