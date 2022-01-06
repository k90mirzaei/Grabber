<?php

namespace codefarm\Grabber\Fields;


class Description extends FieldContract
{
    protected static string $pattern = '/<meta\s?name="description"\s?content="(.*)">/';
}