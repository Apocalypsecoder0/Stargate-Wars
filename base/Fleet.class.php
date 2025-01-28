<?php

class Fleet {
    private $fleets;
    private $travelQueue;

    public function __construct() {
        $this->fleets = [];
        $this->travelQueue = [];
    }

    /**
     * Create a new fleet.
     *
     * @param string $fleetName The name of the fleet.
     * @param array $ships An associative array of ships and their quantities.
     */
    public function createFleet($fleetName, $ships) {
        if (!isset($this->fleets[$fleetName])) {
            $this->fleets[$fleetName] = [
                'ships' => $ships,
                'status' => 'docked',
                'destination' => null,
                'arrivalTime' => null
            ];
        }
    }

    /**
     * Launch a fleet to a destination.
     *
     * @param string $fleetName The name of the fleet to launch.
     * @param string $destination The destination of the fleet.
     * @param int $distance The distance to the destination.
     */
    public function launchFleet($fleetName, $destination, $distance) {
        if (isset($this->fleets[$fleetName]) && $this->fleets[$fleetName]['status'] === 'docked') {
            $travelTime = $this->calculateTravelTime($fleetName, $distance);
            $this->fleets[$fleetName]['status'] = 'in transit';
            $this->fleets[$fleetName]['destination'] = $destination;
            $this->fleets[$fleetName]['arrivalTime'] = time() + $travelTime;
            $this->travelQueue[$fleetName] = $this->fleets[$fleetName];
        }
    }

    /**
     * Calculate the travel time for a fleet.
     *
     * @param string $fleetName The name of the fleet.
     * @param int $distance The distance to the destination.
     * @return int The travel time in seconds.
     */
    private function calculateTravelTime($fleetName, $distance) {
        $speed = FLEET_TRAVEL_SPEEDS['small_cargo']; // Example: using small cargo speed
        return ($distance / $speed) * 3600; // Convert hours to seconds
    }

    /**
     * Resolve a battle between two fleets.
     *
     * @param string $attackingFleet The name of the attacking fleet.
     * @param string $defendingFleet The name of the defending fleet.
     * @return string The result of the battle.
     */
    public function resolveBattle($attackingFleet, $defendingFleet) {
        // Simple battle resolution logic
        $attackerPower = array_sum($this->fleets[$attackingFleet]['ships']);
        $defenderPower = array_sum($this->fleets[$defendingFleet]['ships']);

        if ($attackerPower > $defenderPower) {
            unset($this->fleets[$defendingFleet]);
            return "Attacker wins!";
        } elseif ($defenderPower > $attackerPower) {
            unset($this->fleets[$attackingFleet]);
            return "Defender wins!";
        } else {
            unset($this->fleets[$attackingFleet]);
            unset($this->fleets[$defendingFleet]);
            return "It's a draw!";
        }
    }

    /**
     * Get the list of fleets.
     *
     * @return array The list of fleets.
     */
    public function getFleets() {
        return $this->fleets;
    }
}

?>
