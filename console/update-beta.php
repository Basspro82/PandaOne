<?php

include '../config.php';

require_once '../../framework/log.php';
require_once "../../framework/database.php";
require_once "../../framework/image.php";
require_once "../manager/serieManager.php";

$series = LoadAll('serie',"", 'imdbID');
$ids=[];
while ($row = mysqli_fetch_object($series)) {
    $ids[] = $row->imdbID;
}
$strIds = implode(",",$ids);
$url = "https://api.betaseries.com/shows/display?key=cabf2a885a7d&imdb_id=" . $strIds;
$strData = file_get_contents($url);
$data = json_decode($strData);
foreach ($data->shows as $show) {
    SerieManager::UpdateFromBetaseries($show);
    saveImageFromUrl($show->images->poster,imgPhysicalPath . 'series/posters/' . $show->imdb_id . '.jpg');
    saveImageFromUrl($show->images->show,imgPhysicalPath . 'series/banners/' . $show->imdb_id . '.jpg');
}