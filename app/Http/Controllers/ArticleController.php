<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleCreateRequest;
use App\Http\Requests\ArticleUpdateRequest;
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
        if (request()->has('user')) {
            $data = Article::where('user_id', auth()->user()->id)->latest()->get();
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
    public function detail(Article $article)
    {
        // $data = Article::find($id);
        return view('articles.detail', [
            "article" => $article
        ]);
    }
    public function delete(Article $article)
    {
        if (FacadesGate::denies('edit-delete-post', $article)) {
            return back()->with('error', 'Unauthorized Attempt');
        }
        $article->delete();
        return redirect('/articles')->with('info', 'Article Deleted Successfully..!');
    }
    public function add()
    {
        $data = Category::all();
        return view('articles.add', [
            'categories' => $data
        ]);
    }
    public function create(ArticleCreateRequest $request)
    {
        $article = new Article;
        $article->title = ucwords(request()->title);
        $article->body = request('body');
        $article->description = request('description');
        $article->user_id = auth()->user()->id;
        $article->category_id = request('category_id');
        $article->save();
        return redirect('/articles')->with('info', 'Article Created Successfully..!');
    }
    public function edit(Article $article)
    {
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
    public function update(Article $article, ArticleUpdateRequest $request)
    {
        $article->title = request('title');
        $article->body = request('body');
        $article->description = request('description');
        $article->category_id = request('category_id');
        $article->save();
        return redirect(route('articles.detail', $article->id))->with('info', 'Article Updated Successfully..!');
    }
}
