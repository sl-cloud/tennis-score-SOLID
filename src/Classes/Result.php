<?php
namespace Tennis\Classes;

use Tennis\Interfaces\ResultInterface;

/**
 * Output Game Result
 */
class Result implements ResultInterface
{
    
    public $message;
    
    public function __construct(STRING $message)
    {
        $this->message = $message;
    }
    
    /**
     * Output the result
     */
    public function output()
    {
        if (php_sapi_name() == 'cli') {
            echo $this->message . PHP_EOL;
        } else {
            echo $this->message . "<Br/>\n";
        }
    }
}