<?php

class Resources {
    private $metal;
    private $crystal;
    private $deuterium;

    public function __construct($initialMetal = 0, $initialCrystal = 0, $initialDeuterium = 0) {
        $this->metal = $initialMetal;
        $this->crystal = $initialCrystal;
        $this->deuterium = $initialDeuterium;
    }

    public function addResources($metal, $crystal, $deuterium) {
        $this->metal += $metal;
        $this->crystal += $crystal;
        $this->deuterium += $deuterium;
    }

    public function removeResources($metal, $crystal, $deuterium) {
        if ($this->metal < $metal || $this->crystal < $crystal || $this->deuterium < $deuterium) {
            throw new Exception("Insufficient resources to remove.");
        }
        $this->metal -= $metal;
        $this->crystal -= $crystal;
        $this->deuterium -= $deuterium;
    }

    public function getResources() {
        return [
            'metal' => $this->metal,
            'crystal' => $this->crystal,
            'deuterium' => $this->deuterium
        ];
    }

    public function getMetal() {
        return $this->metal;
    }

    public function getCrystal() {
        return $this->crystal;
    }

    public function getDeuterium() {
        return $this->deuterium;
    }
}

?>
