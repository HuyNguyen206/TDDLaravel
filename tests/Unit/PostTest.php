<?php

namespace Tests\Unit;

use App\Post;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class PostTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    use DatabaseMigrations;

    /**
     * @group test-format-date
     */
    public function test_format_date_function_is_correct()
    {
        $post = Post::create([
            'title' => 'This is title',
            'body' => 'This is body'
        ]);
        $formattedDate = $post->createAt;
        $this->assertEquals($post->created_at->toFormattedDateString(), $formattedDate);
    }
}
