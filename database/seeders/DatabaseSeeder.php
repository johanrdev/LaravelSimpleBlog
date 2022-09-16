<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory(3)->create()->each(function($user) {
            Post::factory(10)->create(['user_id' => $user->id]);

            Category::factory(3)->create(['user_id' => $user->id]);

            $categories = Category::where('user_id', $user->id)->get();

            Post::where('user_id', $user->id)->each(function($post) use ($categories) {
                $post->categories()->attach(
                    $categories->random(rand(1, 3))->pluck('id')->toArray()
                );
            });
        });
    }
}
