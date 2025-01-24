<?
include_once("config.php");
error_log("30min.php script executed.");
$s = new Game();
if($s->turnUpdate())
{
	echo "Successful<br>";
	echo $s->queryCount;
	
}
?>