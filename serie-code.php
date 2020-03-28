<?php

include 'config.php';

require_once '../../framework/log.php';

require_once "manager/serieManager.php";
require_once "manager/commentManager.php";
require_once "model/commentModel.php";

$showLog = false;

// Load Serie Info

$result = LoadOne('serie','serie.imdbID',"'" . $_GET["imdbID"] . "'");
while($row = mysqli_fetch_row($result)){
	$serie = Serie::fromDB($row,0);
}

// Load Serie s comments

$result = CommentManager::LoadAll("comment.imdbID = '" . $serie->imdbID . "'");
while($row = mysqli_fetch_row($result)){
	$comment = Comment::fromDB($row);
	$serie->comments[] = $comment;
}

showLog('serie-code','',$serie);

?>