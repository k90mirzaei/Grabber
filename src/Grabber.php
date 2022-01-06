<?php

namespace codefarm\Grabber;

class Grabber
{
    public static function fields()
    {
        return [
            Fields\Title::class,
            Fields\Description::class,
            Fields\Thumbnail::class,
            Fields\Content::class
        ];
    }
}