<?
include_once("config.php");
include_once("Universe.php");
include_once("Galaxy.php");
include_once("Planet.php");
Debug::printMsg("30min.php", "execute", "Script execution started.");
$universe = new Universe();
foreach ($universe->getGalaxies() as $galaxyData) {
    $galaxy = new Galaxy($galaxyData['name']);
    foreach ($galaxy->getPlanets() as $planetData) {
        $planet = new Planet($planetData['name']);
        // Simulate updates or interactions with planets
        error_log("Updating planet: " . $planet->getName());
    }
}

Debug::printMsg("30min.php", "execute", "Script execution ended.");
?>