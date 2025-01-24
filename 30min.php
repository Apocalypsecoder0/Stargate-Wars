<?
include_once("config.php");
error_log("30min.php script executed.");
$s = new Game();
$s->updateResources(); // New function from OGame
$s->checkFleetStatus(); // New function from OGame
if($s->turnUpdate())
{
	echo "Successful<br>";
	echo $s->queryCount;
	
}
?>