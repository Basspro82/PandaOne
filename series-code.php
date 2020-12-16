<?php

require_once "manager/serieManager.php";
require_once "model/serieModel.php";

$showLog = false;
$page = "series";
$bodyClass='series';

$result = SerieManager::GetLast(0);
while($row = mysqli_fetch_object($result)){
	$serie = Serie::fromDB($row,0);
	$series[] = $serie;
}

/*********************************/
/* SEO */
/*********************************/

$titlePage = 'Liste des séries';
$descriptionPage = 'Liste des séries';

$ogTitle = '';
$ogUrl = '';
$ogImage = '';
$ogDescription = '';

showLog('search-code','',$series[0]);

?>