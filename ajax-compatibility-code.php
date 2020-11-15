<?php

include 'config.php';

require_once '../framework/log.php';
require_once '../framework/database.php';
require_once "manager/commentManager.php";

$showLog = false;

$result = CommentManager::GetScores($_POST['userID'],$_POST['friendID']);

showLog('ajax-compatibility-code','',$_POST);
showLog('ajax-compatibility-code','',$result);

$sum = 0;
$nb = 0;

while($row = mysqli_fetch_object($result)){
	
	$US = $row->userScore;
	$FS = $row->friendScore;

	if ($US > $FS){

		$diff = $US - $FS;

	}else if ($US < $FS){

		$diff = $FS - $US;

	}else{

		$diff = 0;
	
	}

	$sum = $sum + (100 - ($diff * 20));
	$nb = $nb + 1;

}

$taux = $sum / $nb;

if ($showLog) exit;

$response_array['status'] = 'success';
header('Content-type: application/json');
echo json_encode($taux);

?>