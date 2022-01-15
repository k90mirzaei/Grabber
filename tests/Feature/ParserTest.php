<?php

namespace codefarm\Grabber\Tests;

use Carbon\Carbon;
use codefarm\Grabber\Facade\Grabber;
use codefarm\Grabber\HtmlParser;

class ParserTest extends TestCase
{
    /** @test */
    public function parse_raw_html_file()
    {
        $parser = new HtmlParser(__DIR__ . '/../data/blog.html');

        $this->assertNotNull($parser);
    }

    /** @test */
    public function parse_fields_html()
    {
        $html = '<title>title</title>';
        $this->assertEquals('title', (new HtmlParser($html))->getData()['title']);

        $html = '<meta name="description" content="description">';
        $this->assertEquals('description', (new HtmlParser($html))->getData()['description']);

        $html = '<meta property="og:image" content="image.png">';
        $this->assertEquals('image.png', (new HtmlParser($html))->getData()['thumbnail']);

        $html = '<div id="content">body</div>';
        $this->assertEquals('body', (new HtmlParser($html))->getData()['content']);

        $html = '<meta itemprop="datePublished" property="article:published_time" content="1/8/2022 2:31:13 PM">';
        $this->assertInstanceOf(Carbon::class, (new HtmlParser($html))->getData()['date']);
    }

    /** @test */
    public function add_new_field_to_grabber()
    {
        Grabber::fields([
            \codefarm\Grabber\Tests\data\Title::class
        ]);

        $html = '<h1>This is a new Title</h1>';
        $this->assertEquals('This is a new Title', (new HtmlParser($html))->getData()['title']);
    }
}




