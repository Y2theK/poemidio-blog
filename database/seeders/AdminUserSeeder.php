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
            'password' => bcrypt('12345678')
        ]);
        $admin = User::create([
            'name' => 'admin',
            'email' => 'myadmin@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $user = User::create([
            'name' => 'normaluser',
            'email' => 'user@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        //giving user to permission
        $admin->givePermissionTo([
            'user-list','user-create','user-edit','user-delete',
            'article-list','article-create','article-edit','article-delete',
            'category-list','category-create','category-edit','category-delete',
        ]);
        $user->givePermissionTo([
            'article-list','article-create','article-edit','article-delete',
            'category-list',
        ]);
        
        //creating roles
        $roleSuperAdmin = Role::create(['name' => 'Super-Admin']);
        $roleAdmin = Role::create(['name' => 'Admin']);
        $roleUser = Role::create(['name' => 'User']);
        
        //giving permission to roles
        $roleAdmin->givePermissionTo([
            'user-list','user-create','user-edit','user-delete',
            'article-list','article-create','article-edit','article-delete',
            'category-list','category-create','category-edit','category-delete',
           
        ]);
        $roleUser->givePermissionTo('article-list', 'article-create', 'article-edit', 'article-delete', 'category-list');
   
        //assigning users to roles
        $superadmin->assignRole($roleSuperAdmin);
        $admin->assignRole($roleAdmin);
        $user->assignRole($roleUser);
    }
}
