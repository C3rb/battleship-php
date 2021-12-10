<?php

use PHPUnit\Framework\TestCase;

class AiTest extends TestCase
{
    public function testGetRandomPosition()
    {
        $board = new \Battleship\Board(1, 2);
        $position1 = App::getRandomPosition($board);
        $position2 = App::getRandomPosition($board);

        $this->assertNotEquals($position1->__toString(), $position2->__toString());
    }
}
