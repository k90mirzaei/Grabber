<?php

namespace codefarm\Grabber\Fields;

use Carbon\Carbon;

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