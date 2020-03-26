<?php

include 'config.php';

require_once '../../framework/log.php';

require_once "manager/commentManager.php";
require_once "model/comment.php";

$showLog = false;

$series;
$result = CommentManager::GetLast(10,0,0,'');
while($row = mysqli_fetch_row($result)){
	$comment = Comment::fromDB($row);
	$comments[] = $comment;
}

showLog('home-code','',$comments[0]);

?>