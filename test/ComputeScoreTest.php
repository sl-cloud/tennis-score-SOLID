<?php
declare(strict_types=1);
require_once 'vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Tennis\Classes\Game;

class ComputeScoreTest extends TestCase
{
    private $game;
    function setUp(): void
    {
        $this->game = new Game('Bob', 'Anna');
    }
    
    /**
     * This test the error message when the wins array contain an incorrect name
     */
    public function testException1() {
        $this->expectOutputRegex('/Please check your input array/i');
        $this->game->wins(['Bob','Bob','Anna','Ann','Anna','Bob','Anna','Bob','Bob','Anna','Anna','Anna','Anna']);
    }
    
    /**
     * This test exception thrown when non array value used as input for wins method
     */
    public function testException2() {
        $this->expectException(TypeError::class);
        $this->game->wins('Bob');
    }
    
    /**
     * Test expected return game status for empty wins array
     */
    public function testEmptyWins() 
    {
        $this->expectOutputString("Bob 0 - Anna 0\n");
        $this->game->wins();
    }
    
    public function test1() {
        $this->expectOutputString("Bob 15 - Anna 30\n");
        $this->game->wins(['Anna', 'Bob', 'Anna']);
    }
    public function test2() {
        $this->expectOutputString("15a\n");
        $this->game->wins(['Bob','Anna']);
    }
    public function test3() {
        $this->expectOutputString("30a\n");
        $this->game->wins(['Bob','Bob', 'Anna', 'Anna']);
    }
    public function test4() {
        $this->expectOutputString("Anna WINS\n");
        $this->game->wins(['Bob','Bob','Anna','Anna','Anna','Bob','Anna','Bob','Bob','Anna','Anna','Anna','Anna']);
    }
    public function test5() {
        $this->expectOutputString("DEUCE\n");
        $this->game->wins(['Bob','Bob','Bob', 'Anna', 'Anna', 'Anna']);
    }
    public function test6() {
        $this->expectOutputString("Bob Advantage\n");
        $this->game->wins(['Bob','Bob','Bob', 'Anna', 'Anna', 'Anna', 'Bob']);
    }
    public function test7() {
        $this->expectOutputString("DEUCE\n");
        $this->game->wins(['Bob','Bob','Bob', 'Anna', 'Anna', 'Anna', 'Bob', 'Anna', 'Bob', 'Anna']);
    }
    public function test8() {
        $this->expectOutputString("Bob WINS\n");
        $this->game->wins(['Bob','Bob','Bob', 'Anna', 'Anna', 'Anna', 'Bob', 'Bob', 'Anna', 'Anna']);
    }
    public function test9() {
        $this->expectOutputString("Anna Advantage\n");
        $this->game->wins(['Bob','Bob','Bob', 'Anna', 'Anna', 'Anna', 'Bob', 'Anna', 'Anna']);
    }
    public function test10() {
        $this->expectOutputString("Bob 30 - Anna 15\n");
        $this->game->wins(['Bob', 'Anna', 'Bob']);
    }
    public function test11() {
        $this->expectOutputString("Bob 15 - Anna 40\n");
        $this->game->wins(['Anna', 'Anna', 'Bob', 'Anna']);
    }
    
}