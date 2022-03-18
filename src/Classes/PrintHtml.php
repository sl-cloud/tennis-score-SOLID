<?php
namespace Tennis\Classes;

use Tennis\Interfaces\PrintInterface;

/**
 * Class to print message in HTML
 */
class PrintHtml implements PrintInterface
{

    public function __construct(STRING $message)
    {
        $this->message = $message;
    }

    public function output()
    {
        echo $this->message . "<Br/>\n";
    }
}