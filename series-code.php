<?php

include 'config.php';

require_once '../../framework/log.php';

require_once "manager/serieManager.php";
require_once "model/serie.php";

$showLog = false;

$series;
$result = SerieManager::GetLast(10);
while($row = mysqli_fetch_row($result)){
	$serie = Serie::fromDB($row,0);
	$series[] = $serie;
}

showLog('search-code','',$series[0]);

?>