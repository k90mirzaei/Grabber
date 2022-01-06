<?php

namespace codefarm\Grabber;

use codefarm\Grabber\Fields\Content;
use codefarm\Grabber\Fields\Description;
use codefarm\Grabber\Fields\Thumbnail;
use codefarm\Grabber\Fields\Title;
use Illuminate\Support\Facades\File;

class BlogPostParser
{
    protected $data;

    protected $rawData;

    protected $filename;

    protected $fields;

    public function __construct($filename)
    {
        $this->filename = $filename;

        $this->fetchFields();

        $this->parseData();
    }

    protected function fetchFields()
    {
        $this->fields = config('grabber.fields');
    }

    protected function parseData()
    {
        // content of html
        $this->rawData = File::get($this->filename);

        $this->data = array_merge($this->data, Title::process('title', $this->rawData));
        $this->data = array_merge($this->data, Description::process('description', $this->rawData));
        $this->data = array_merge($this->data, Thumbnail::process('thumbnail', $this->rawData));
        $this->data = array_merge($this->data, Content::process('content', $this->rawData));
    }

    public function getData()
    {
        return $this->data;
    }
}