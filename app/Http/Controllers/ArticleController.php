<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Facade;
use App\Http\Requests\ArticleCreateRequest;
use App\Http\Requests\ArticleUpdateRequest;
use Illuminate\Support\Facades\Gate as FacadesGate;

class ArticleController extends Controller
{
    public function __construct(Article $article)
    {
        $this->middleware('permission:article-list', ['only' => ['index','detail']]);

        $this->middleware('permission:article-create', ['only' => ['add','create']]);

        $this->middleware('permission:article-edit', ['only' => ['edit','update']]);

        $this->middleware('permission:article-delete', ['only' => ['delete']]);
    }

    
    public function index()
    {
        $data = Article::with(['category','user'])->latest()->get();
        
        return view('articles.index', [
            "articles" => $data,
           
        ]);
    }
    public function detail(Article $article)
    {
        // $data = Article::find($id);
        return view('articles.detail', [
            "article" => $article
        ]);
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
            $request->validated() + ['user_id' => auth()->id()]
        );
        return redirect()->route('articles.index')->with('info', 'Article Created Successfully..!');
    }
   
    
    public function edit(Article $article)
    {
        $categories = Category::all();
        if (! FacadesGate::allows('owner-edit-delete-post', $article)) {
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
    public function delete(Article $article)
    {
        if (FacadesGate::denies('owner-edit-delete-post', $article)) {
            abort(403, 'Unauthorized');
        }
        $article->delete();
        return redirect()->route('articles.index')->with('info', 'Article Deleted Successfully..!');
    }
}
