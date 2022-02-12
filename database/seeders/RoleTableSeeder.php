<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleTableSeeder extends Seeder
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
         
        $roles = [
           'Super-Admin',
           'Admin',
           'Super-User',
           'User'
        ];
        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }
        //giving permission to roles
        // $roleAdmin->givePermissionTo([
        //     'user-list','user-create','user-edit','user-delete',
        //     'article-list','article-create','article-edit','article-delete',
        //     'category-list','category-create','category-edit','category-delete',
           
        // ]);
        // $roleUser->givePermissionTo('article-list', 'article-create', 'article-edit', 'article-delete', 'category-list');
    }
}
