<?php
namespace Tennis\Classes;

use Tennis\Interfaces\ScoreInterface;

/**
 * Abstract Class for Compute Score
 *
 */
abstract class AbractComputeScore implements ScoreInterface
{
    // Compute state for low win game
    abstract protected function lowWins(): bool;

    // Compute state for high win game
    abstract protected function highWins(): bool;
}