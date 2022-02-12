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
    public function getNotifications(User $user)
    {
        $notifications = $user->notifications->where('type', CommentCreatedNotification::class)->all();
        
        
        // dd($notifications->data);
        return view('profile.notifications', compact('notifications'));
    }
}
