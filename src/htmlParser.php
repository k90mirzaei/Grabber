<?php

namespace codefarm\Grabber;

use codefarm\Grabber\Fields\Content;
use codefarm\Grabber\Fields\Description;
use codefarm\Grabber\Fields\Thumbnail;
use codefarm\Grabber\Fields\Title;
use Illuminate\Support\Facades\File;

class htmlParser
{
    protected $filename;

    protected $fields;

    protected $data = [];

    protected $rawData;

    public function __construct($filename)
    {
        $this->filename = $filename;

        $this->fetchFields();

        $this->fetchRawData();

        $this->parseData();
    }

    protected function fetchFields()
    {
        $this->fields = Grabber::fields();
    }

    protected function fetchRawData()
    {
        $this->rawData = File::exists($this->filename) ? File::get($this->filename) : $this->filename;
    }

    protected function parseData()
    {


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