<?php

include 'config.php';

require_once '../../framework/log.php';

require_once "manager/commentManager.php";
require_once "model/commentModel.php";

$showLog = false;

$series;
$result = CommentManager::LoadAll('comment.userID = 1');
while($row = mysqli_fetch_row($result)){
	$comment = Comment::fromDB($row);
	$comments[] = $comment;
}

showLog('my-comments-code','',$comments[0]);

?>