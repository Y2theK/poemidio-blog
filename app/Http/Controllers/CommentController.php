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
        $comment = new Comment;
        $comment::create(
            $request->validated() + ['user_id' => auth()->id()]
        );
        $article =  Article::where('id', $request->article_id)->first();
        // dd($article->user, $article->title);
        if ($article->user_id != auth()->id()) {
            $created_comment_event_data = [
            'comment_user' => auth()->user(), // get author of the commented content
            'article' => $article
        ];
        
            event(new CommentCreatedEvent($created_comment_event_data));
        }
        return redirect()->route('articles.detail', request()->article_id)->with('info', 'Comment Created Successfully..!');
    }
    public function delete($id)
    {
        $comment = Comment::find($id);
        if (! $this->authorize('owner-delete-comment', $comment)) {
            abort('403', 'Unauthorized pr');
        }
        
        $comment->delete();
        return redirect()->back();
    }
}
