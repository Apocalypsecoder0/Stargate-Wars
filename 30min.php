<?
include_once("config.php");
error_log("30min.php script executed.");
$s = new Game();
try {
    $s->updateResources(); // New function from OGame
    $s->checkFleetStatus(); // New function from OGame
} catch (Exception $e) {
    error_log("Error executing OGame functions: " . $e->getMessage());
}
if($s->turnUpdate())
{
	echo "Successful<br>";
	echo $s->queryCount;
	
}
?>