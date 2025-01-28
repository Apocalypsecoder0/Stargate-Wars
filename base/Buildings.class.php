<?php

class Buildings {
    private $buildings;
    private $constructionQueue;

    public function __construct() {
        $this->buildings = [];
        $this->constructionQueue = [];
    }

    /**
     * Start the construction of a building.
     *
     * @param string $buildingName The name of the building to construct.
     * @param int $duration The time required to complete the construction.
     */
    public function startConstruction($buildingName, $duration) {
        if (!isset($this->buildings[$buildingName])) {
            $this->buildings[$buildingName] = [
                'level' => 0,
                'status' => 'under construction',
                'progress' => 0,
                'duration' => $duration
            ];
            $this->constructionQueue[$buildingName] = $this->buildings[$buildingName];
        }
    }

    /**
     * Check the progress of a building's construction.
     *
     * @param string $buildingName The name of the building to check.
     * @return string The progress status of the building.
     */
    public function checkProgress($buildingName) {
        if (isset($this->constructionQueue[$buildingName])) {
            $building = $this->constructionQueue[$buildingName];
            $progress = ($building['progress'] / $building['duration']) * 100;
            return "Building: $buildingName, Progress: $progress%";
        }
        return "Building: $buildingName is not under construction.";
    }

    /**
     * Complete the construction of a building.
     *
     * @param string $buildingName The name of the building to complete.
     */
    public function completeBuilding($buildingName) {
        if (isset($this->constructionQueue[$buildingName])) {
            $this->buildings[$buildingName]['level'] += 1;
            $this->buildings[$buildingName]['status'] = 'completed';
            unset($this->constructionQueue[$buildingName]);
        }
    }
}
?>
