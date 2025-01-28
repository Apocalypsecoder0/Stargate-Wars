<?php

class Universe {
    private $galaxies = [];
    private $seed;

    public function __construct() {
        $this->seed = $this->generateSeed();
        $this->createGalaxies();
    }

    private function generateSeed() {
        // Generate a random seed for the universe
        return rand(1000, 9999);
    }

    private function createGalaxies() {
        // Create a number of galaxies based on the seed
        $numGalaxies = $this->seed % 10 + 1; // Example logic for number of galaxies
        for ($i = 0; $i < $numGalaxies; $i++) {
            $this->galaxies[] = $this->createGalaxy($i);
        }
    }

    private function createGalaxy($index) {
        $galaxy = [
            'name' => "Galaxy $index",
            'solarSystems' => $this->createSolarSystems()
        ];
        return $galaxy;
    }

    private function createSolarSystems() {
        $solarSystems = [];
        $numSolarSystems = rand(1, 5); // Example logic for number of solar systems
        for ($i = 0; $i < $numSolarSystems; $i++) {
            $solarSystems[] = $this->createSolarSystem($i);
        }
        return $solarSystems;
    }

    private function createSolarSystem($index) {
        $solarSystem = [
            'name' => "Solar System $index",
            'planets' => $this->createPlanets(),
            'interstellarObjects' => $this->createInterstellarObjects()
        ];
        return $solarSystem;
    }

    private function createPlanets() {
        $planets = [];
        $numPlanets = rand(1, 9); // Example logic for number of planets
        for ($i = 0; $i < $numPlanets; $i++) {
            $planets[] = [
                'name' => "Planet $i",
                'type' => $this->randomPlanetType()
            ];
        }
        return $planets;
    }

    private function createInterstellarObjects() {
        $objects = [];
        $numObjects = rand(0, 3); // Example logic for number of interstellar objects
        for ($i = 0; $i < $numObjects; $i++) {
            $objects[] = [
                'name' => "Interstellar Object $i",
                'type' => $this->randomInterstellarObjectType()
            ];
        }
        return $objects;
    }

    private function randomPlanetType() {
        $types = ['Terrestrial', 'Gas Giant', 'Ice Giant', 'Dwarf'];
        return $types[array_rand($types)];
    }

    private function randomInterstellarObjectType() {
        $types = ['Asteroid', 'Comet', 'Nebula'];
        return $types[array_rand($types)];
    }

    public function getGalaxies() {
        return $this->galaxies;
    }
}

?>
