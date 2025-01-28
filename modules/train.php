<?
include_once("../config.php");

$pagegen = new page_gen();
$pagegen->round_to = 4;
$pagegen->start();

$s = new Game();

if (!$s->loggedIn || !$_GET['time']){ header("Location: https://realmbattles.org/SGWnew/index.php?"); }

if(!$_REQUEST) {$s->updatePower($_SESSION['userid']);}

if ($_REQUEST['id'] == "untrn")
{
	Debug::printMsg("train.php", "untrainUnits", "Parameters: resatk={$_REQUEST['resatk']}, resdef={$_REQUEST['resdef']}, rescov={$_REQUEST['rescov']}, resanti={$_REQUEST['resanti']}, resmin={$_REQUEST['resmin']}");
	$s->untrainUnits($_REQUEST['resatk'],$_REQUEST['resdef'],$_REQUEST['rescov'],$_REQUEST['resanti'],$_REQUEST['resmin']);
$s->updatePower($_SESSION['userid']);
}
if ($_REQUEST['id'] == "trn")
{	
	Debug::printMsg("train.php", "trainUnits", "Parameters: atk={$_POST['atk']}, uberAtk={$_POST['uberAtk']}, def={$_POST['def']}, uberDef={$_POST['uberDef']}, miners={$_POST['miners']}, cov={$_POST['cov']}, uberCov={$_POST['uberCov']}, anti={$_POST['anti']}, uberAnti={$_POST['uberAnti']}");
	$s->trainUnits($_POST['atk'],$_POST['uberAtk'],$_POST['def'],$_POST['uberDef'],
			  		$_POST['miners'],$_POST['cov'],$_POST['uberCov'],$_POST['anti'],
			  		$_POST['uberAnti']);
	$s->updatePower($_SESSION['userid']);
}
?>
<table width="100%" border="0">
  <tr>
    <td width="47%" align="center" valign="top"><? include_once('personnel.php'); ?></td>
    <td width="53%" align="center" valign="top">
      <table width="100%" border="0">
        <tr>
          <td align="center" valign="top"><a href='javascript:void(0)' onclick="trainthis('2train'); return false">Train</a> | <a href='javascript:void(0)' onclick="trainthis('untrain'); return false">Untrain</a></td>
        </tr>
        <tr>
          <td><div id="display">&nbsp;</div></td>
        </tr>
      </table>

	</td>
  </tr>
</table>
<?
echo "Query Count: ".$s->queryCount."<br>";
$pagegen->stop();
print('page generation time: ' . $pagegen->gen());
?>