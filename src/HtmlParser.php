<?php

namespace codefarm\Grabber;

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
        foreach ($this->fields as $field) {
            $this->data = array_merge(
                $this->data,
                $field::process(strtolower(class_basename($field)), $this->rawData)
            );
        }
    }

    public function getData()
    {
        return $this->data;
    }
}