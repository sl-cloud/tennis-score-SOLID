<?php
namespace Tennis\Classes;

use Exception;

/**
 * This is the main Game class
 */
class Game
{

    protected $nameP1;

    protected $nameP2;

    protected $gameState;

    /**
     * On class initialisation, the name of play one and player two are required
     *
     * @param STRING $nameP1
     *            - the name of the first player
     * @param STRING $nameP2
     *            - the name of the second player
     *            
     */
    public function __construct(string $nameP1, string $nameP2)
    {
        $this->nameP1 = $nameP1;
        $this->nameP2 = $nameP2;

        // (new Result("Tennis game status between {$this->nameP1} and {$this->nameP2}"))->output();
    }

    public function wins(array $wins = []): void
    {
        /**
         * Check that computeScore is a sub class of AbractComputeScore
         * Which also check that it implements ScoreInterface
         */
        $computeScore = new ComputeScore($this->nameP1, $this->nameP2);
        if (is_a($computeScore, 'Tennis\Classes\AbractComputeScore')) {
            $this->gameState = $computeScore->setWins($wins)->getState();
        } else {
            throw new Exception("Class is not an instance of AbractComputeScore AND ScoreInterface");
            exit();
        }

        (new Result($this->gameState))->output();
    }
}