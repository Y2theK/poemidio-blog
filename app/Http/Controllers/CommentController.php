<?php

namespace App\Http\Controllers;

 use App\Models\Comment;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate as FacadesGate;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create()
    {
        $comment = new Comment;
        $comment->content = request()->content;
        $comment->article_id = request()->article_id;
        $comment->user_id = auth()->user()->id;
        $comment->save();
        return back();
    }
    public function delete($id)
    {
        $comment = Comment::find($id);
        
        if (FacadesGate::denies('comment-delete', $comment)) {
            return back()->with('error', 'Unauthorized Attempt');
        }
        $comment->delete();
        return back();
    }
}
