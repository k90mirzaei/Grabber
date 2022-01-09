# Customizable package to grab data from webpage using PHP

[![Latest Version on Packagist](https://img.shields.io/packagist/v/codefarm/grabber.svg?style=flat-square)](https://packagist.org/packages/codefarm/grabber)
![Tests](https://github.com/codefarm/grabber/workflows/Tests/badge.svg)
[![Total Downloads](https://img.shields.io/packagist/dt/codefarm/grabber.svg?style=flat-square)](https://packagist.org/packages/codefarm/grabber)

This customizable package can extract data from website and html files. Here's how you can use it:


## Installation

You can install the package via composer:

```bash
composer require codefarm/grabber
```

## Usage

Here are a few short examples of what you can do:

``` php
$parser = new HtmlParser($path_to_html_file);
$parser->getData();
```

It can also a string html:

``` php
$parser = new HtmlParser($string_html);
$parser->getData();
```

Or you can even add even custom pattern:

``` php
use codefarm\Grabber\Facade\Grabber;

Grabber::fields([
    CustomPattern::class
]);

$parser = new HtmlParser($string_html);
$parser->getData();
```

### Testing

``` bash
composer test
```

## License

The MIT License (MIT).