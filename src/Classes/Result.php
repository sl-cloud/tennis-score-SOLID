<?php
namespace Tennis\Classes;

use Tennis\Classes\PrintCli;
use Tennis\Classes\PrintHtml;
use ReflectionClass;

/**
 * Output Game Result
 */
class Result
{

    public $message;

    public function __construct(STRING $message)
    {
        $this->message = $message;
    }

    /**
     * Output the result
     * Check the print class is implements Tennis\Interfaces\PrintInterface
     */
    public function output(): void
    {
        if (php_sapi_name() == 'cli') {
            $printClass = new ReflectionClass('Tennis\Classes\PrintCli');
            if($printClass->implementsInterface('Tennis\Interfaces\PrintInterface')) {
                (new PrintCli($this->message))->output();
            }
        } else {
            $printClass = new ReflectionClass('Tennis\Classes\PrintHtml');
            if($printClass->implementsInterface('Tennis\Interfaces\PrintInterface')) {
                (new PrintHtml($this->message))->output();
            }
        }
    }
}