<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostValidationTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic feature test example.
     * @group test-post-validation
     * @return void
     */
    public function test_post_validation()
    {
        $response = $this->post('posts', [
            'title' => null,
            'body' => ''
        ]);
        $response->assertSessionHasErrors('title');
//        $response->assertStatus(422);
    }
}
