<?php

namespace Tests\Feature;

use App\Mail\CommentReceived;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class MailTest extends TestCase
{
    public function testSendingOfMailForCreatedComment()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $user->id]);

        Mail::fake();

        $this->actingAs($user)->post(                                            // u redu je da crveni $user
            "/posts/{$post->id}/comments",                                       // dupli navodnici i viticaste zagrade vadjanje podataka usred stringa
            [
                'body' => 'This is some comment',
            ]
        );

        Mail::assertSent(CommentReceived::class);              
    }
}
