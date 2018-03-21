<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostDetailsTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function postConttainsCorrectDetails()
    {
        $post = factory(\App\Post::class)->create();
        $post->load('author');

        $response  = $this->get(route('posts.show', $post));
        $response->assertStatus(200);
        $response->assertSee('inviato da ' . $post->author->name . ' il ' . $post->created_at->format('d/m/Y H:i'));
    }
}
