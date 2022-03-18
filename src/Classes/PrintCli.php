<?php
namespace Tennis\Classes;

use Tennis\Interfaces\ResultInterface;

/**
 * Class to print message in CLI
 */
class PrintCli implements ResultInterface
{
    protected $message;
    
    public function __construct(STRING $message){
        $this->message = $message;        
    }
    
    public function output(){
        echo $this->message . PHP_EOL;
    }
}