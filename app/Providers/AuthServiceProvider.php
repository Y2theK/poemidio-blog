<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    use HasRoles;
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::before(function ($user, $ability) {
            return $user->hasRole('Super-Admin') ? true : null;
        });
        Gate::define('owner-delete-comment', function ($user, $comment) {
            return $user->id == $comment->user_id;
        });
        Gate::define('owner-delete-category', function ($user, $category) {
            return $user->id == $category->user_id;
        });

        Gate::define('owner-edit-delete-post', function ($user, $article) {
            return $user->id == $article->user_id;
        });
    }
}
