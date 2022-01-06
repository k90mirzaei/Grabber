<?php

namespace codefarm\Grabber\Tests;

use codefarm\Grabber\htmlParser;
use Orchestra\Testbench\TestCase;

class ParserTest extends TestCase
{
    /** @test */
    public function parse_raw_html_file()
    {
        $parser = new htmlParser(__DIR__ . '/../data/blog.html');

        dd($parser->getData());

        $this->assertTrue(true);
    }
}




