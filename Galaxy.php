<?php

class Galaxy {
    private $name;
    private $planets = [];
    private $resources = [];

    public function __construct($seed) {
        // Initialize the galaxy with a seed
        srand($seed);
        $this->name = "Galaxy_" . $seed;
        $this->generatePlanets();
        $this->initializeResources();
    }

    private function generatePlanets() {
        // Procedurally generate planets
        $numberOfPlanets = rand(3, 15); // Random number of planets
        for ($i = 0; $i < $numberOfPlanets; $i++) {
            $this->planets[] = $this->generatePlanet($i);
        }
    }

    private function generatePlanet($seed) {
        // Use the seed to generate a planet
        srand($seed);
        $planetName = "Planet_" . $seed;
        $planetType = $this->getRandomPlanetType();
        $hasMoons = (bool)rand(0, 1);
        $moons = $hasMoons ? $this->generateMoons() : 0;

        return [
            'name' => $planetName,
            'type' => $planetType,
            'moons' => $moons
        ];
    }

    private function generateMoons() {
        // Generate a random number of moons
        return rand(1, 3);
    }

    private function getRandomPlanetType() {
        $types = ['Class M', 'Class K', 'Class L', 'Class H', 'Class J'];
        return $types[array_rand($types)];
    }

    private function initializeResources() {
        // Initialize resources inspired by OGame
        $this->resources = [
            'metal' => rand(1000, 5000),
            'crystal' => rand(1000, 5000),
            'deuterium' => rand(1000, 5000)
        ];
    }

    public function getPlanets() {
        return $this->planets;
    }

    public function getResources() {
        return $this->resources;
    }

    public function getName() {
        return $this->name;
    }
}

?>
