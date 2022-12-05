<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    public function testGettingOfPosts()
    {
        // 1. Korak (arrange) nemamo jer nemamo testinh podataka
        
        // 2. Korak (act) - izvrsavamo test
        $response = $this->get('/posts');
        
        // 3. Korak (assert) - utvrdjujemo da li je test uspesan
        $response->assertStatus(200);                                       // ili $response->assertOk();
    }

    public function testCreatePostPage()
    {
        $user = User::factory()->create();                                  // testi user u upotrebi jer guest nema pristup /posts/create zbog auth middleware-a
        $response = $this->actingAs($user)->get('/posts/create');           // $user testin user, ok je da $user crveni podvuceno
        $response->assertStatus(200);                                       
    }

    public function testCreatePostPageWithoutAuthenticatedUser()
    {                                 
        $response = $this->get('/posts/create');           
        $response->assertRedirect('/login');                                     
    }

    public function testCreationOfPost()
    {
        $user = User::factory()->create();                                  
        $response = $this->actingAs($user)->post(                           // dva parametra, ruta i podaci za bazu
            '/posts',                                                       // ovde testiram kreiranje postova
            [
                'title' => 'Testing post title',
                'body' => 'Testing post body'
            
            ]
        );           
        $response->assertRedirect('/posts');                                // ako je sve kako treba, bicemo preusmereni ([PostController::class, 'store'])                              
    }
}

    
