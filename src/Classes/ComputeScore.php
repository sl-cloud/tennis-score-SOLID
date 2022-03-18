<?php
namespace Tennis\Classes;

use Tennis\Interfaces\ScoreInterface;

/**
 * Compute the score and return the state of the game
 * When both players has won less than 4 points, it will use the lowWins method
 * If one or both players win at least 4 points, it will use the highWins method
 */
class ComputeScore implements ScoreInterface
{
    //Player names
    protected $nameP1;
    protected $nameP2;
    
    // default scores
    protected $p1Score = 0;
    protected $p2Score = 0;

    // number of wins
    protected $p1Wins = 0;
    protected $p2Wins = 0;

    // Possible scores not including DEUCE and ADVANTAGE
    protected $possibleScores = [
        0,
        15,
        30,
        40
    ];
    
    //The state of the game
    protected $state;
    

    public function __construct(string $nameP1, string $nameP2, array $wins)
    {
        $this->nameP1 = $nameP1;
        $this->nameP2 = $nameP2;
        
        $this->switch($wins);
    }

    /**
     * This method is used to decide if lowScore or highScore is used
     * 
     * $param ARRAY $wins is passed from __construct, no type hinting required
     * 
     */
    protected function switch($wins)
    {
        foreach ($wins as $player) {
            // We will make sure the name of the player matches either player 1 or player 2 or we will throw an exception
            if ($player != $this->nameP1 AND $player != $this->nameP2) {
                $this->state = "{$player} is not in the match.  Please check your input array.";
                (new Result(print_r($wins, 1)))->output();
                break;
            } else {
                // Incrementing number of wins for each player
                if ($player == $this->nameP1) {
                    $this->p1Wins ++;
                } else {
                    $this->p2Wins ++;
                }
            }
            
            if ($this->p1Wins < 4 AND $this->p2Wins < 4) {
                // If both players have less than 4 wins
                if($this->lowWins()){
                    break;
                }
            } else {
                // If at least one player reaches 4 wins
                if($this->highWins()){
                    break;
                }
            }
        }
        
        
    }
    
    /**
     * Compute game state when both players have won less than 4 wins
     */
    protected function lowWins() {
        $this->p1Score = $this->possibleScores[$this->p1Wins];
        $this->p2Score = $this->possibleScores[$this->p2Wins];
        
        // Both players have the same number of wins
        if ($this->p1Wins == $this->p2Wins) {
            // If number of wins reaches 3 and the scores are the same, than it is DEUCE.
            // This can happen when the score is 40 - 40
            if ($this->p1Wins == 3) {
                $this->state = "DEUCE";
            } else {
                $this->state = "{$this->p1Score}a";
            }
        } else {
            $this->state = "{$this->nameP1} {$this->p1Score} - {$this->nameP2} {$this->p2Score}";
        }
    }
    
    /**
     * Once at least one of the player won 4 wins, we can compute for DUECE, ADVANTAGE, or WIN
     * Note the score can be DUECE even if no player have 4 wins
     *
     * These are the possiblities:
     * 1) If the difference in wins is less than 2, it is advantage to the player with higher wins
     * 2) If the difference is 2, the player wins the game
     * 3) If the wins are the same, then it is DEUCE
     */
    protected function highWins() {
        // We will find the leading player
        if ($this->p1Wins != $this->p2Wins) {
            if ($this->p1Wins > $this->p2Wins) {
                $winner = $this->nameP1;
                $diff = $this->p1Wins - $this->p2Wins;
            } else {
                $winner = $this->nameP2;
                $diff = $this->p2Wins - $this->p1Wins;
            }
            
            if ($diff < 2) {
                $this->state = "{$winner} Advantage";
            } else {
                // Game won, return true;
                $this->state = "{$winner} WINS";
                return true;
            }
        } else {
            // Deuce
            $this->state = "DEUCE";
        }
    }
    
    
    /**
     * Return the game state
     */
    public function getState()
    {
        return $this->state;
    }
}