<?php

include 'config.php';

require_once '../../framework/log.php';

require_once "manager/serieManager.php";
require_once "manager/commentManager.php";
require_once "model/commentModel.php";

$showLog = false;
$page = "user";


// Load user

$result = LoadOne('user','userID',$_GET['userID']);
while($row = mysqli_fetch_row($result)){
	$user = User::fromDB($row,0);
}

showLog('user-code','',$user);

// Load serie's user

$result = CommentManager::LoadAll('comment.userID = ' . $_GET['userID']);
while($row = mysqli_fetch_row($result)){
	$comment = Comment::fromDB($row);
	$comments[] = $comment;
	$series[] = $comment->serie;
}

showLog('user-code','',$series);

?>