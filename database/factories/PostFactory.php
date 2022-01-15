<?php

use codefarm\Grabber\Models\Post;

$factory->define(Post::class, function (Faker\Generator $faker) {

    return [
        'title' => $this->faker->sentence,
        'slug' => str_replace(' ', '-', strtolower($this->faker->sentence)),
        'description' => $this->faker->text(500),
        'body' => $this->faker->paragraphs(20, true),
        'published_at' => now()
    ];
});