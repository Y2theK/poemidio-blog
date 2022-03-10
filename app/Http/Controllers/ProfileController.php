<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Notifications\CommentCreatedNotification;

class ProfileController extends Controller
{
    public function index(User $user)
    {
        return view('profile.index', compact('user'));
    }
    public function getCommentNotifications(User $user)
    {
        abort_if(auth()->user() != $user, 403, 'Unauthorized');
        $notifications = $user->notifications->where('type', CommentCreatedNotification::class)->all();
        return view('profile.notifications', compact('notifications'));
    }
    public function markAsRead($userId, $notiId)
    {
        $notification = auth()->user()->notifications->find($notiId);
        abort_if(!$notification, 404);
        $notification->markAsRead();
        return redirect()->route('articles.detail', $notification->data['article_id']);
    }
}
