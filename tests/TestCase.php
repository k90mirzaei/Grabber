<?php

namespace codefarm\Grabber\Tests;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            \codefarm\Grabber\BaseServiceProvider::class,
        ];
    }
}