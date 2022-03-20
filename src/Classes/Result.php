<?php
namespace Tennis\Classes;

use Tennis\Classes\PrintCli;
use Tennis\Classes\PrintHtml;

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
     */
    public function output(): void
    {
        if (php_sapi_name() == 'cli') {
            (new PrintCli($this->message))->output();
        } else {
            (new PrintHtml($this->message))->output();
        }
    }
}