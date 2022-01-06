<?php

namespace codefarm\Grabber\Fields;


class Thumbnail extends FieldContract
{
    protected static string $pattern = '/<meta\s?property="og:image"\s?content="(.*)">/';
}