<?php
namespace Tennis\Interfaces;

/**
 * Score interface
 * setWins -> lowWins/highWins
 */

interface ScoreInterface
{
    //Set wins and calculate the method to use
    public function setWins(ARRAY $wins): self;
    
    //Get the state of the game
    public function getState(): string;
}