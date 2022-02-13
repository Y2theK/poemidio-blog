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

        // \App\Models\Article::factory(0)->create();
        // \App\Models\Comment::factory(0)->create();

       

        //seeding category
        $categories = ['Modern','Other','Haiku','Limerick','Sonnet'];
        foreach ($categories as $category) {
            \App\Models\Category::factory()->create([
            'name' => $category,
            
        ]);
        }
    }
}
