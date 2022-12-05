<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostsTableTest extends TestCase
{
    public function testPostCreationInPostsTable()
    {
        // Arrange Korak - testin podaci
        $user = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $user->id]);
        // act deo - upisujem post u posts tabelu
        $post->save();
        // assert deo - da li je post uspesno upisan u tabelu posts
        $this->assertDatabaseHas(
            'posts',
            [
                'title' => $post->title,
                'body' => $post->body
            ]
        );
    }
}
