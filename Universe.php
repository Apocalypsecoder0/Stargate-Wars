<?php

class Universe {
    private $galaxies = [];

    public function __construct() {
        // Initialize the universe with a seed
        $this->seedUniverse();
    }

    private function seedUniverse() {
        // Procedurally generate galaxies
        $numberOfGalaxies = rand(5, 10); // Random number of galaxies
        for ($i = 0; $i < $numberOfGalaxies; $i++) {
            $this->galaxies[] = $this->generateGalaxy($i);
        }
    }

    private function generateGalaxy($seed) {
        // Use the seed to generate a galaxy
        srand($seed);
        $galaxyName = "Galaxy_" . $seed;
        $numberOfPlanets = rand(3, 15); // Random number of planets
        $planets = [];

        for ($j = 0; $j < $numberOfPlanets; $j++) {
            $planets[] = $this->generatePlanet($j);
        }

        return [
            'name' => $galaxyName,
            'planets' => $planets
        ];
    }

    private function generatePlanet($seed) {
        // Use the seed to generate a planet
        srand($seed);
        $planetName = "Planet_" . $seed;
        $planetType = $this->getRandomPlanetType();
        $hasMoons = (bool)rand(0, 1);

        return [
            'name' => $planetName,
            'type' => $planetType,
            'moons' => $hasMoons ? rand(1, 3) : 0
        ];
    }

    private function getRandomPlanetType() {
        $types = ['Class M', 'Class K', 'Class L', 'Class H', 'Class J'];
        return $types[array_rand($types)];
    }

    public function getGalaxies() {
        return $this->galaxies;
    }
}

?>
