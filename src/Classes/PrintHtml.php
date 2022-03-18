<?php
namespace Tennis\Classes;

use Tennis\Interfaces\ResultInterface;

/**
 * Class to print message in HTML
 */
class PrintHtml implements ResultInterface
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