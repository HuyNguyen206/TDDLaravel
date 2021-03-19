<?php

namespace Tests\Feature;

use App\Post;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostPageTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic feature test example.
     * @group user-can-view-post-page
     * @return void
     */
    public function test_user_can_view_post_page()
    {
        $post = Post::create([
           'title' => 'This is title',
           'body' => 'This is body'
        ]);

        $res = $this->get("posts/$post->id");

        $res->assertStatus(200);
        $res->assertSee($post->title);
        $res->assertSee($post->body);
        $res->assertSee($post->create_at);
    }

    /**
     * @group post-not-found
     */
    public function test_post_not_found_404_page(){
        $res = $this->get("posts/invalid_id");
        $res->assertStatus(404);
        $res->assertSee('The page you are looking for could not be found');
    }
}
