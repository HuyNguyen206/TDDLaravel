<?php

namespace Tests\Feature;

use App\Post;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreatePostTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic feature test example.
     * @group test-create-post
     * @return void
     */
    public function test_user_can_create_test()
    {
        $response = $this->post('posts', [
            'title' => 'new post title',
            'body' => 'new post body'
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('posts',[
            'title' => 'new post title',
            'body' => 'new post body'
        ]);
        $post = Post::find(1);
        $this->assertEquals('new post title', $post->title);
        $this->assertEquals('new post body', $post->body);

    }
}
