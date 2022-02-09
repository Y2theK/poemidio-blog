<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $articleCount = Article::count();
        $userCount = User::role('User')->count();
        $adminCount = User::role(['Admin', 'Super-Admin'])->count();
        $notifications = auth()->user()->notifications;
        // dd($notifications);
        // dd($adminCount);
        return view('admin.dashboard', compact('articleCount', 'userCount', 'adminCount', 'notifications'));
    }
}
