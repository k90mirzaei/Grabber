<?php

namespace codefarm\Grabber\Fields;

abstract class FieldContract
{
    /**
     * the pattern of field parser
     *
     * @var string
     */
    protected static string $pattern = '';

    /**
     * Processes the field and parse it from raw data
     *
     * @param $type
     * @param $data
     * @return array
     */
    public static function process($type, $data): array
    {
        if (!static::$pattern)
            return [];

        preg_match(static::$pattern, $data, $matches);

        return [
            $type => trim($matches[1])
        ];
    }
}