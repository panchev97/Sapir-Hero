<?php

class Vaderus
{
    private $name = "Vaderus";

    private $health;

    private $strength;

    private $defence;

    private $speed;

    /**
     * Vaderus constructor.
     */
    public function __construct()
    {
        $this->health = rand(70, 100);
        $this->strength = rand(70, 80);
        $this->defence = rand(45, 55);
        $this->speed = rand(40, 50);
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

    public function attack(WildBeast $wildBeast)
    {
        $damage = $this->getStrength() - $wildBeast->getDefence();
        $wildBeast->reduceHealth($damage);
    }

    public function calculateDamage(WildBeast $wildBeast)
    {
        return $this->getStrength() - $wildBeast->getDefence();
    }

    public function isAlive(): bool
    {
        return $this->health > 0;
    }
}