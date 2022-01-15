<?php

namespace codefarm\Grabber\Tests\Feature;

use codefarm\Grabber\Models\Post;
use codefarm\Grabber\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function create_a_new_post()
    {
        Post::create([
            'title' => 'Sample Title',
            'slug' => 'sample-title',
            'description' => 'Sample Description',
            'body' => 'Sample Body',
            'published_at' => now()
        ]);

        $this->assertCount(1, Post::all());
    }

    /** @test */
    public function create_post_with_factory()
    {
        factory(Post::class)->create();

        $this->assertCount(1, Post::all());
    }
}