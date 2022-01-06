<?php

namespace codefarm\Grabber\Tests;

use codefarm\Grabber\BlogPostParser;

class ParserTest extends TestCase
{
    /** @test */
    public function parse_raw_html_file()
    {
//        dd(config('grabber.fields'));

        $parser = new BlogPostParser(__DIR__ . '/../data/blog.html');

        dd($parser->getData());

        $this->assertTrue(true);
    }
}




