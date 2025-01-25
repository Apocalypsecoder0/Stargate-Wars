<?
include_once("config.php");
include_once("Universe.php");
include_once("Galaxy.php");
include_once("Planet.php");
error_log("30min.php script executed.");
$universe = new Universe();
foreach ($universe->getGalaxies() as $galaxyData) {
    $galaxy = new Galaxy($galaxyData['name']);
    foreach ($galaxy->getPlanets() as $planetData) {
        $planet = new Planet($planetData['name']);
        // Simulate updates or interactions with planets
        error_log("Updating planet: " . $planet->getName());
    }
}

error_log("Universe state updated.");
?>