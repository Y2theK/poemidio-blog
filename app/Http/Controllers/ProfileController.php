<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(User $user)
    {
        return view('profile.index', compact('user'));
    }
}
