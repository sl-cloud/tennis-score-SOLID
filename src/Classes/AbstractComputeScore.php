<?php
namespace Tennis\Classes;

/**
 * Abstract Class for Compute Score
 */
abstract class AbractComputeScore
{
    //This method will decide if we use the lowWins or highWins method
    abstract protected function switch(ARRAY $wins);
    
    //Compute state for low win game
    abstract protected function lowWins();
    
    //Compute state for high win game
    abstract protected function highWins();
}