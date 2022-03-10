<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
    protected static $provider = 'facebook';
    public function handleFacebookRedirect()
    {
        return Socialite::driver(static::$provider)->redirect();
    }
    public function handleFacebookCallback()
    {
        //get oauth request back from github to authenticate user
        $user = Socialite::driver(static::$provider)->user();
        // dd($user);
        //if this user doesnt exist add them
        //if they do get the model
        //either way authentitate the user into the application and redirect afterwards
        $user = User::firstOrCreate([
            'email' => $user->email
        ], [
            'name' => $user->name,
            'password' => Hash::make(Str::random(10))
        ]);
        $user->assignRole('User');
        $user->givePermissionTo([
            'article-list','article-create','article-edit','article-delete',
            'category-list',
        ]);
        Auth::login($user, true);
        return redirect('/');
    }
}
