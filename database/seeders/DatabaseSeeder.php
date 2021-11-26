<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       // \App\Models\Article::factory(0)->create();
        //\App\Models\Category::factory(0)->create();
        //\App\Models\Comment::factory(0)->create();
        \App\Models\User::factory()->create([
            'name' => "Y2theK",
            'email' => "y2k@gmail.com"
        ]);
        \App\Models\User::factory()->create([
            'name' => "Mikey",
            'email' => "mikey@gmail.com"
        ]);
         \App\Models\Category::factory()->create([
            'name' => "Modern",
            
        ]);
          \App\Models\Category::factory()->create([
            'name' => 'other'
        ]);
          \App\Models\Category::factory()->create([
            'name' => "Sonnet",
            
        ]);
            \App\Models\Category::factory()->create([
            'name' => "Haiku",
            
        ]);
              \App\Models\Category::factory()->create([
            'name' => "Limerick",
            
        ]);
    }
}
