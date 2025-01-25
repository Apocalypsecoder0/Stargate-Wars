<?php

class Planet {
    private $name;
    private $type;
    private $moons;
    private $resources;

    public function __construct($seed) {
        // Initialize the planet with a seed
        srand($seed);
        $this->name = "Planet_" . $seed;
        $this->type = $this->getRandomPlanetType();
        $this->moons = $this->generateMoons();
        $this->initializeResources();
    }

    private function getRandomPlanetType() {
        // Inspired by Star Trek planet classes
        $types = ['Class M', 'Class K', 'Class L', 'Class H', 'Class J'];
        return $types[array_rand($types)];
    }

    private function generateMoons() {
        // Generate a random number of moons
        return rand(0, 3);
    }

    private function initializeResources() {
        // Initialize resources inspired by OGame
        $this->resources = [
            'metal' => rand(500, 2000),
            'crystal' => rand(500, 2000),
            'deuterium' => rand(500, 2000)
        ];
    }

    public function getName() {
        return $this->name;
    }

    public function getType() {
        return $this->type;
    }

    public function getMoons() {
        return $this->moons;
    }

    public function getResources() {
        return $this->resources;
    }
}

?>
