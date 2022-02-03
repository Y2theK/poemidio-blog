<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\AdminUserSeeder;
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
        \App\Models\Article::factory(20)->create();
        \App\Models\Comment::factory(40)->create();

        //seeding users
        \App\Models\User::factory()->create([
            'name' => "Y2theK",
            'email' => "y2k@gmail.com"
        ]);
        \App\Models\User::factory()->create([
            'name' => "admin",
            'email' => "admin@gmail.com"
        ]);

        //seeding category
        $categories = ['Modern','Other','Haiku','Limerick','Sonnet'];
        foreach ($categories as $category) {
            \App\Models\Category::factory()->create([
            'name' => $category,
            
        ]);
        }

        //seeding PermissionTableSeeder and AdminUserSeeder
        $this->call([
            PermissionTableSeeder::class,
            AdminUserSeeder::class
        ]);
    }
}
