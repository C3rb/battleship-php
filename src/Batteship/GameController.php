<?php

namespace Battleship;

use InvalidArgumentException;

class GameController
{

    public static function checkIsHit(array $fleet, $shot)
    {
        if ($fleet == null) {
            throw new InvalidArgumentException("ships is null");
        }

        if ($shot == null) {
            throw new InvalidArgumentException("shot is null");
        }

        /** @var Ship $ship */
        foreach ($fleet as $ship) {
            foreach ($ship->getPositions() as $position) {
                if ($position == $shot) {
                    $ship->hit();

                    return true;
                }
            }
        }

        return false;
    }

    /**
     * @param array    $fleet
     * @param Position $position
     * @return Ship|null
     */
    public static function getShip(array $fleet, Position $position)
    {
        /** @var Ship $ship */
        foreach ($fleet as $ship) {
            foreach ($ship->getPositions() as $shipPosition) {
                if ($position == $shipPosition) {
                    return $ship;
                }
            }
        }

        return null;
    }

    public static function initializeShips()
    {
        return [
            new Ship("Aircraft Carrier", 5, Color::CADET_BLUE),
            new Ship("Battleship", 4, Color::RED),
            new Ship("Submarine", 3, Color::CHARTREUSE),
            new Ship("Destroyer", 3, Color::YELLOW),
            new Ship("Patrol Boat", 2, Color::ORANGE)];
    }

    public static function isShipValid($ship)
    {
        return count($ship->getPositions()) == $ship->getSize();
    }

    public static function getRandomPosition()
    {
        $rows = 8;
        $lines = 8;

        $letter = Letter::value(random_int(0, $lines - 1));
        $number = random_int(0, $rows - 1);

        return new Position($letter, $number);
    }
}
