<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::all()->each(
            function (Post $post) {
                $comments = Comment::factory(6)->create(['post_id' => $post->id]);
                $post->comments()->saveMany($comments);
            }
        );
    }
}
