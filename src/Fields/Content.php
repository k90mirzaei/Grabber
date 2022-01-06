<?php

namespace codefarm\Grabber\Fields;


class Content extends FieldContract
{
    protected static string $pattern = '/<div\sid="content">([\s\S]*)(?=<\/div>)/';
}