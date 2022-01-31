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
    }
   
    public function index()
    {
        if (request()->has('user')) {
            $data = Article::where('user_id', auth()->user()->id)->latest()->get();
            $name = auth()->user()->name;
        } else {
            $data = Article::with(['category','user'])->latest()->get();
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
            abort(403, 'Unauthorized');
        }
        $article->delete();
        return redirect()->route('articles.index')->with('info', 'Article Deleted Successfully..!');
    }
    public function add()
    {
        $categories = Category::all();
        return view('articles.add', [
            'categories' => $categories
        ]);
    }
    public function create(ArticleCreateRequest $request)
    {
        $article = new Article;
        $article::create(
            $request->validated()
        );
        return redirect()->route('articles.index')->with('info', 'Article Created Successfully..!');
    }
    public function edit(Article $article)
    {
        $categories = Category::all();
        if (! FacadesGate::allows('edit-delete-post', $article)) {
            abort(403, 'Unauthorized');
        }
        return view('articles.edit', [
            "article" => $article,
            "categories" => $categories
        ]);
    }
    public function update(Article $article, ArticleUpdateRequest $request)
    {
        $article->update($request->validated());
        return redirect()->route('articles.detail', $article->id)->with('info', 'Article Updated Successfully..!');
    }
}
