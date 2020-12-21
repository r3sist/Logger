<?php declare(strict_types = 1);
/**
 * Run this script to generate public API documentation
 */

use resist\Dirtydoc\MarkdownGenerator;
use resist\Logger\Logger;
use resist\Logger\LoggerService;
use resist\Logger\LogMapper;

require_once(__DIR__.'/vendor/autoload.php');

$classes = [
    Logger::class,
    LoggerService::class,
    LogMapper::class,
];

$md = '';

foreach ($classes as $className) {
    $dd = new MarkdownGenerator($className);
    $md .= $dd->getMarkdown()."\n\n---\n\n";
}

file_put_contents('./API.md', $md);
