<?php

namespace codefarm\Grabber\Tests;

use codefarm\Grabber\GrabberServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            GrabberServiceProvider::class
        ];
    }
}