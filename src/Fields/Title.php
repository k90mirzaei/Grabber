<?php

namespace codefarm\Grabber\Fields;


class Title extends FieldContract
{
    protected static string $pattern = '/<title>([\w\W]*)<\/title>/';
}