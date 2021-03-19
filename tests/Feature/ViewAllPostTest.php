<?php

namespace Tests\Feature;

use App\Post;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class ViewAllPostTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic feature test example.
     * @group view-all-post
     * @return void
     */
    public function test_can_view_all_post()
    {
        $post1 = factory(Post::class)->create();
        $post2 = factory(Post::class)->create();

        $response = $this->get('posts');

        $response->assertStatus(200);
        $response->assertSee($post1->title);
        $response->assertSee(Str::limit($post1->body, 100, ''));
        $response->assertSee($post2->title);
        $response->assertSee(Str::limit($post2->body, 100, ''));
    }
}
