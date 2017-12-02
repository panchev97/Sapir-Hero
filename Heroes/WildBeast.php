<?php

class WildBeast
{
    private $name = "Wild Beast";

    private $health;

    private $strength;

    private $defence;

    private $speed;

    /**
     * WildBeast constructor.
     */
    public function __construct()
    {
        $this->health = rand(60, 90);
        $this->strength = rand(60, 90);
        $this->defence = rand(40, 60);
        $this->speed = rand(40, 60);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getHealth(): int
    {
        return $this->health;
    }

    /**
     * @return int
     */
    public function getStrength(): int
    {
        return $this->strength;
    }

    /**
     * @return int
     */
    public function getDefence(): int
    {
        return $this->defence;
    }

    /**
     * @return int
     */
    public function getSpeed(): int
    {
        return $this->speed;
    }

    public function reduceHealth(int $health)
    {
        $this->health -= $health;
    }

    public function attack(Vaderus $vaderus)
    {
        $damage = $this->getStrength() - $vaderus->getDefence();
        $vaderus->reduceHealth($damage);
    }

    public function calculateDamage(Vaderus $vaderus)
    {
        return $this->getStrength() - $vaderus->getDefence();
    }

    /**
     * @return bool
     */
    public function isAlive(): bool
    {
        return $this->health > 0;
    }
}