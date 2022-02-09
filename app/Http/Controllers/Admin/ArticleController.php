<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index()
    {
        if (auth()->user()->cannot('article-list')) {
            abort(403, 'u do not have access');
        }
        $articles = Article::with('user')->latest()->get();
        // dd($articles);
        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->cannot('article-create')) {
            abort(403, 'u do not have access');
        }
        return abort(403, 'Working in Progress');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (auth()->user()->cannot('article-create')) {
            abort(403, 'u do not have access');
        }
        return abort(403, 'Working in Progress');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (auth()->user()->cannot('article-list')) {
            abort(403, 'u do not have access');
        }
        return abort(403, 'Working in Progress');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (auth()->user()->cannot('article-edit')) {
            abort(403, 'u do not have access');
        }
        return abort(403, 'Working in Progress');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (auth()->user()->cannot('article-edit')) {
            abort(403, 'u do not have access');
        }
        return abort(403, 'Working in Progress');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        if (auth()->user()->cannot('article-delete')) {
            abort(403, 'u do not have access');
        }
        $article->destroy($article->id);
        return redirect()->route('admin.articles.index')->with('info', 'Article Deleted Successfully');
    }
}
