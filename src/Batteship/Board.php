<?php

namespace Battleship;

class Board
{
    /** @var array */
    private $fields;

    public function __construct(int $rows, int $columns)
    {
        $this->fields = [];
        for ($r = 0; $r < $rows; $r++) {
            $this->fields[Letter::$letters[$r]] = [];
            for ($c = 1; $c <= $columns; $c++) {
                $this->fields[Letter::$letters[$r]][] = null;
            }
        }
    }

    public function setField(Position $position, string $value)
    {
        if (false === array_key_exists($position->getColumn(), $this->fields)) {
            throw new \InvalidArgumentException('Position ' . $position . ' is outside');
        }
        if (false === array_key_exists($position->getRow(), $this->fields[$position->getColumn()])) {
            throw new \InvalidArgumentException('Position ' . $position . ' is outside');
        }
        if (null !== $this->fields[$position->getColumn()][$position->getRow()]) {
            throw new \InvalidArgumentException('Position ' . $position . ' is already occupied by ' . $this->getValue($position));
        }
        $this->fields[$position->getColumn()][$position->getRow()] = $value;
    }

    public function getValue(Position $position)
    {
        return $this->fields[$position->getColumn()][$position->getRow()];
    }
}
