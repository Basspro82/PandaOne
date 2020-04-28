<?php

require_once "manager/serieManager.php";
require_once "model/serieModel.php";

$showLog = false;
$page = "serie";

$result = SerieManager::GetLast(0);
while($serie = mysqli_fetch_object($result)){

    $serie->url = "/serie?imdbID=" . $serie->imdbID;
	//$serie = Serie::fromDB($row,0);
	$series[] = $serie;
}

showLog('search-code','',$series[0]);

?>