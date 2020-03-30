<?php

include 'config.php';

require_once '../../framework/log.php';

require_once "manager/commentManager.php";
require_once "model/commentModel.php";

$showLog = false;
$page = 'home';

$series;
$result = CommentManager::LoadAll('',10);
while($row = mysqli_fetch_row($result)){
	$comment = Comment::fromDB($row);
	$comments[] = $comment;
}

showLog('home-code','',$comments[0]);

?>