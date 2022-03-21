<?php
namespace Tennis\Classes;

use Tennis\Interfaces\ScoreInterface;

/**
 * Abstract Class for Compute Score
 *
 * switch -> lowWins/highWins
 */
abstract class AbractComputeScore implements ScoreInterface
{

    // This method will decide if we use the lowWins or highWins method
    abstract protected function switch(ARRAY $wins): void;

    // Compute state for low win game
    abstract protected function lowWins(): bool;

    // Compute state for high win game
    abstract protected function highWins(): bool;
}