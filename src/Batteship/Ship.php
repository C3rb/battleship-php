<?php

namespace Battleship;

class Ship
{

    private $name;
    private $size;
    private $color;
    private $positions = array();
    private $hits;

    public function __construct($name, $size, $color = null)
    {
        $this->name = $name;
        $this->size = $size;
        $this->color = $color;
        $this->hits = 0;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }

    public function addPosition($input)
    {
        $letter = substr($input, 0, 1);
        $number = substr($input, 1, 1);

        array_push($this->positions, new Position($letter, $number));
    }

    /**
     * @return void
     */
    public function hit() {
        $this->hits++;
    }

    /**
     * @return bool
     */
    public function isDestroyed() {
        return $this->hits >= $this->size;
    }

    public function &getPositions()
    {
        return $this->positions;
    }

    public function setSize($size)
    {
        $this->size = $size;
    }

}
