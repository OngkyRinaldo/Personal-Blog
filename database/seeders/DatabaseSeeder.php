<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
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
        Category::create([
           'title' => 'Sports',
           'slug' => 'sports'
        ]);
        Category::create([
            'title' => 'Politics',
            'slug' => 'politics'
        ]);
        Category::create([
            'title' => 'Web Programming',
            'slug' => 'web-programming'
        ]);
        Category::create([
            'title' => 'Vacations',
            'slug' => 'vacations'
        ]);
        Category::create([
            'title' => 'Foods',
            'slug' => 'foods'
        ]);
        Category::create([
            'title' => 'Football',
            'slug' => 'football'
        ]);


        User::factory(10)->create();
        Tag::factory(10)->create();
        Post::factory(20)->create();

        User::factory(1)->create([
            'name' => 'admin',
            'username' =>'admin',
            'email' => 'admin@example.com',
            'password'=>bcrypt('password'),
            'role' => 'admin'
        ]);

        User::factory(1)->create([
            'name' => 'user',
            'username' =>'user',
            'email' => 'user@example.com',
            'password'=>bcrypt('password'),
            'role' => 'user'
        ]);



        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
