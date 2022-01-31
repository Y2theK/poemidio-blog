<?php

namespace App\Http\Controllers;

 use App\Models\Comment;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Auth\Access\Gate;
use App\Http\Requests\CommentCreateRequest;
use Illuminate\Support\Facades\Gate as FacadesGate;

class CommentController extends Controller
{
    public function create(CommentCreateRequest $request)
    {
        $comment = new Comment;
        $comment::create(
            $request->validated() + ['user_id' => auth()->id()]
        );
        return redirect()->route('articles.detail', request()->article_id)->with('info', 'Comment Created Successfully..!');
    }
    public function delete($id)
    {
        $comment = Comment::find($id);
        
        if (FacadesGate::denies('comment-delete', $comment)) {
            abort('403', 'Unauthorized');
        }
        $comment->delete();
        return redirect()->route('articles.detail', $article->id)->with('info', 'Comment Deleted Successfully..!');
    }
}
