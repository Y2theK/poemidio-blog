<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
       
         
        //creating users
        $superadmin = User::create([
            'name' => 'superadmin',
            'email' => 'mysuperadmin@gmail.com',
            'password' => bcrypt('asdfasdf')
        ]);
        $admin = User::create([
            'name' => 'admin',
            'email' => 'myadmin@gmail.com',
            'password' => bcrypt('asdfasdf')
        ]);
        $superuser = User::create([
            'name' => 'superuser',
            'email' => 'superuser@gmail.com',
            'password' => bcrypt('asdfasdf')
        ]);
        $user = User::create([
            'name' => 'normaluser',
            'email' => 'user@gmail.com',
            'password' => bcrypt('asdfasdf')
        ]);
        //assigning users to roles
        $superadmin->assignRole('Super-Admin');
        $admin->assignRole('Admin');
        $superuser->assignRole('Super-User');
        $user->assignRole('User');
        
        //giving user to permission
        $admin->givePermissionTo([
            'user-list','user-create','user-edit','user-delete',
            'article-list','article-create','article-edit','article-delete',
            'category-list','category-create','category-edit','category-delete',
            'comment-list','comment-create','comment-edit','comment-delete',
            'notification-list','notification-create','notification-edit','notification-delete',
        ]);
        $superuser->givePermissionTo([
            'article-list','article-create','article-edit','article-delete',
            'category-list','category-create','category-edit','category-delete',
            'comment-list','comment-create','comment-edit','comment-delete',
        ]);
        $user->givePermissionTo([
            'article-list','article-create','article-edit','article-delete',
            'category-list',
            'comment-list','comment-create','comment-edit','comment-delete',
        ]);
    }
}
