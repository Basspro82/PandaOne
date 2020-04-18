<?php

include 'config.php';

require_once '../../framework/log.php';

require_once "manager/serieManager.php";
require_once "model/serieModel.php";

$showLog = false;
$page = "series";

$result = SerieManager::GetLast(10);
while($serie = mysqli_fetch_object($result)){

    $serie->url = "/serie?imdbID=" . $serie->imdbID;
	//$serie = Serie::fromDB($row,0);
	$series[] = $serie;
}

showLog('search-code','',$series[0]);

?>