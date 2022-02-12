<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\AdminUserSeeder;
use Database\Seeders\RoleTableSeeder;
use Database\Seeders\PermissionTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //seeding PermissionTableSeeder and AdminUserSeeder
        $this->call([
            RoleTableSeeder::class,
            PermissionTableSeeder::class,
            AdminUserSeeder::class
        ]);

        \App\Models\Article::factory(30)->create();
        \App\Models\Comment::factory(50)->create();

        //seeding users
        \App\Models\User::factory()->create([
            'name' => "Y2theK",
            'email' => "y2k@gmail.com"
        ]);
      
        \App\Models\User::factory()->create([
            'name' => "superuser",
            'email' => "superuser@gmail.com"
        ]);

        //seeding category
        $categories = ['Modern','Other','Haiku','Limerick','Sonnet'];
        foreach ($categories as $category) {
            \App\Models\Category::factory()->create([
            'name' => $category,
            
        ]);
        }
    }
}
