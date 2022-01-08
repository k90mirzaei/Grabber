<?php

namespace codefarm\Grabber\Facade;

use Illuminate\Support\Facades\Facade;

class Grabber extends Facade
{
    public static function getFacadeAccessor(): string
    {
        return 'Grabber';
    }
}