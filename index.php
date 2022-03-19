#!/usr/bin/env php
<?php
/**
 * This script is an extension of the tennis script using the SOLID Principle
 *
 * @author Steve Lee
 * @version 0.0.4
 */

require_once 'vendor/autoload.php';

use Tennis\Classes\Game;
use Tennis\Classes\Result;

try {
    $game = new Game('Bob', 'Anna');
    
    //0-0
    $game->wins();
    
    //Anna winning 15 - 30
    $game->wins(['Anna', 'Bob', 'Anna']);
    
    //15a
    $game->wins(['Bob','Anna']);
    
    //30a
    $game->wins(['Bob','Bob', 'Anna', 'Anna']);
    
    //Anna wins
    $game->wins(['Bob','Bob','Anna','Anna','Anna','Bob','Anna','Bob','Bob','Anna','Anna','Anna','Anna']);

    //DEUCE on 40 - 40
    $game->wins(['Bob','Bob','Bob', 'Anna', 'Anna', 'Anna']);
    
    //Bob Advantage from 40 - 40 DUECE
    $game->wins(['Bob','Bob','Bob', 'Anna', 'Anna', 'Anna', 'Bob']);
    
    //DEUCE when one of more play won more than 3 games
    $game->wins(['Bob','Bob','Bob', 'Anna', 'Anna', 'Anna', 'Bob', 'Anna', 'Bob', 'Anna']);
    
    //Bob wins even when we provide more data in the array then needed
    $game->wins(['Bob','Bob','Bob', 'Anna', 'Anna', 'Anna', 'Bob', 'Bob', 'Anna', 'Anna']);
    
    //Anna Advantage from DUECE not 40 - 40
    $game->wins(['Bob','Bob','Bob', 'Anna', 'Anna', 'Anna', 'Bob', 'Anna', 'Anna']);
    
    //Bob 30 - 15
    $game->wins(['Bob', 'Anna', 'Bob']);
    
    //15 - 40
    $game->wins(['Anna', 'Anna', 'Bob', 'Anna']);
    
    //Exception
    $game->wins(['Bob','Bob','Anna','Ann','Anna','Bob','Anna','Bob','Bob','Anna','Anna','Anna','Anna']);
    
    //Typecast error
    $game->wins('Bob');
    
} catch (ArgumentCountError $e) {
    (new Result($e->getMessage()))->output();
} catch (TypeError $e) {
    (new Result($e->getMessage()))->output();
} catch (Exception $e) {
    echo $e->getMessage();
} 