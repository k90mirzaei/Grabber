<?php

namespace codefarm\Grabber\Fields;

abstract class FieldContract
{
    /**
     * the pattern of field parser
     *
     * @var string
     */
    protected static string $pattern;

    /**
     * Processes the field and parse it from raw data
     *
     * @param $type
     * @param $data
     * @return array
     */
    public static function process($type, $data): array
    {
        if (!self::$pattern)
            return [];

        preg_match(self::$pattern, $data, $matches);

        return [
            $type => $matches[1]
        ];
    }
}