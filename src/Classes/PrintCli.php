<?php
namespace Tennis\Classes;

use Tennis\Interfaces\PrintInterface;

/**
 * Class to print message in CLI
 */
class PrintCli implements PrintInterface
{
    protected $message;
    
    public function __construct(STRING $message){
        $this->message = $message;        
    }
    
    public function output(){
        echo $this->message . PHP_EOL;
    }
}