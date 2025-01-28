```
####
Part to replace:
define('OGAME_API_KEY', 'your_actual_api_key'); // Updated OGame API key
define('RESOURCE_UPDATE_INTERVAL', 30); // Verified constant for resource update interval in minutes
define('DEFAULT_NUM_GALAXIES', 5); // Default number of galaxies

// Initial resource amounts
define('INITIAL_METAL', 5000);
define('INITIAL_CRYSTAL', 3000);
define('INITIAL_DEUTERIUM', 2000);

// Research costs
define('RESEARCH_COSTS', [
    'technology1' => ['metal' => 1000, 'crystal' => 500, 'deuterium' => 200],
    'technology2' => ['metal' => 2000, 'crystal' => 1000, 'deuterium' => 400],
    // Add more technologies as needed
]);
define('DEFAULT_NUM_SOLAR_SYSTEMS', 3); // Default number of solar systems per galaxy
define('DEFAULT_NUM_PLANETS', 8); // Default number of planets per solar system

// Building configuration
define('INITIAL_BUILDING_LEVELS', [
    'metal_mine' => 1,
    'crystal_mine' => 1,
    'deuterium_synthesizer' => 1,
]);
define('BUILDING_CONSTRUCTION_COSTS', [
    'metal_mine' => ['metal' => 60, 'crystal' => 15, 'deuterium' => 0],
    'crystal_mine' => ['metal' => 48, 'crystal' => 24, 'deuterium' => 0],
    'deuterium_synthesizer' => ['metal' => 225, 'crystal' => 75, 'deuterium' => 0],
]);
define('BUILDING_CONSTRUCTION_TIMES', [
    'metal_mine' => 60, // in seconds
    'crystal_mine' => 90,
    'deuterium_synthesizer' => 120,
]);

// Fleet configuration
define('FLEET_SIZES', [
    'small_cargo' => 5,
    'large_cargo' => 25,
    'light_fighter' => 10,
]);
define('FLEET_FUEL_COSTS', [
    'small_cargo' => 10,
    'large_cargo' => 50,
    'light_fighter' => 20,
]);
define('FLEET_TRAVEL_SPEEDS', [
    'small_cargo' => 5000, // in units per hour
    'large_cargo' => 7500,
    'light_fighter' => 12500,
]);

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'password');
define('DB_NAME', 'game_database');
```