<?php

namespace codefarm\Grabber\Tests\data;

use codefarm\Grabber\Fields\FieldContract;

class Title extends FieldContract
{
    protected static string $pattern = '/<h1>([\w\W]*)<\/h1>/';
}