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
        $notifications = $user->notifications->where('type', CommentCreatedNotification::class)->all();
        
        
        // dd($notifications->data);
        return view('profile.notifications', compact('notifications'));
    }
    public function markAsRead($id)
    {
        $notification = auth()->user()->notifications->find($id);
        if ($notification) {
            $notification->markAsRead();
            return redirect()->route('articles.detail', $notification->data['article_id']);
        }
        dd($notification);
    }
}
