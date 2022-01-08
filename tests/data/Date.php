<?php

namespace codefarm\Grabber\Tests\data;

use Carbon\Carbon;
use codefarm\Grabber\Fields\FieldContract;

class Date extends FieldContract
{
    protected static string $pattern = '/<meta[^>]*property="article:published_time"\s?content="(.*)">/';

    public static function process($type, $data): array
    {
        if (!static::$pattern)
            return []; // exception

        preg_match(static::$pattern, $data, $matches);

        if ($matches && count($matches) > 1) {
            return [
                $type => Carbon::make(trim($matches[1])),
                'now' => Carbon::now()
            ];
        }

        return [];
    }
}