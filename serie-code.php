<?php

require_once "manager/serieManager.php";
require_once "manager/commentManager.php";
require_once "model/commentModel.php";

$showLog = false;
$page = "serie";
$nbComments = 0;
$averageRate = '';

// Load Serie Info

$result = LoadOne('serie','serie.imdbID',"'" . $_GET["imdbID"] . "'");
while($row = mysqli_fetch_object($result)){
	$serie = Serie::fromDB($row,0);
}
$serie->comments = [];
// Load Serie s comments
$nbComments = 0;
$sum = 0;
$result = CommentManager::LoadAll("comment.imdbID = '" . $serie->imdbID . "'");
while($row = mysqli_fetch_object($result)){
	$comment = Comment::fromDB($row);
	$serie->comments[] = $comment;
	$nbComments = $nbComments + 1;
	$sum = $sum + $comment->score;
}

$averageRate = $nbComments>0 ? round($sum/$nbComments,1) : 0;

showLog('serie-code','',$serie);

?>