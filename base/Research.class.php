<?php

class Research {
    private $ongoingResearch;
    private $completedTechnologies;
    private $researchProgress;

    public function __construct() {
        $this->ongoingResearch = [];
        $this->completedTechnologies = [];
        $this->researchProgress = [];
    }

    public function startResearch($technology, $cost, $resources) {
        if (isset($this->ongoingResearch[$technology])) {
            throw new Exception("Research on this technology is already in progress.");
        }

        if ($resources->getMetal() < $cost['metal'] || 
            $resources->getCrystal() < $cost['crystal'] || 
            $resources->getDeuterium() < $cost['deuterium']) {
            throw new Exception("Insufficient resources to start research.");
        }

        $resources->removeResources($cost['metal'], $cost['crystal'], $cost['deuterium']);
        $this->ongoingResearch[$technology] = true;
        $this->researchProgress[$technology] = 0;
    }

    public function checkResearchProgress($technology) {
        if (!isset($this->ongoingResearch[$technology])) {
            throw new Exception("No research in progress for this technology.");
        }

        return $this->researchProgress[$technology];
    }

    public function unlockTechnology($technology) {
        if (!isset($this->ongoingResearch[$technology])) {
            throw new Exception("No research in progress for this technology.");
        }

        if ($this->researchProgress[$technology] < 100) {
            throw new Exception("Research is not yet complete.");
        }

        unset($this->ongoingResearch[$technology]);
        unset($this->researchProgress[$technology]);
        $this->completedTechnologies[] = $technology;
    }

    public function updateResearchProgress($technology, $progress) {
        if (!isset($this->ongoingResearch[$technology])) {
            throw new Exception("No research in progress for this technology.");
        }

        $this->researchProgress[$technology] += $progress;
        if ($this->researchProgress[$technology] > 100) {
            $this->researchProgress[$technology] = 100;
        }
    }

    public function getCompletedTechnologies() {
        return $this->completedTechnologies;
    }
}

?>
