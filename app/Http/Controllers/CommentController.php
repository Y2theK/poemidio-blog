<?php

namespace App\Http\Controllers;

 use App\Models\Comment;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Auth\Access\Gate;
use App\Events\CommentCreatedEvent;
use App\Http\Requests\CommentCreateRequest;
use Illuminate\Support\Facades\Gate as FacadesGate;

class CommentController extends Controller
{
    public function create(CommentCreateRequest $request)
    {
        $comment = Comment::create(
            $request->validated() + ['user_id' => auth()->id()]
        );
        $article =  Article::where('id', $request->article_id)->first();
        if ($article->user_id != auth()->id()) {
            //comment data
            $created_comment_event_data = [
            'article' => $article
        ];
            event(new CommentCreatedEvent($created_comment_event_data));
        }
        return redirect()->route('articles.detail', request()->article_id)->with('info', 'Comment Created Successfully..!');
    }
    public function delete($id)
    {
        $comment = Comment::find($id);
        abort_if(! $this->authorize('owner-delete-comment', $comment), 403, 'Unauthorized');
        $comment->delete();
        return redirect()->back();
    }
}
