<?php

include 'config.php';

require_once '../../framework/log.php';

require_once "manager/commentManager.php";
require_once "model/commentModel.php";

require_once "manager/replyManager.php";
require_once "model/replyModel.php";

$showLog = false;
$page = "comment";

// Load comment

$result = CommentManager::LoadOne($_GET['commentID']);
while($row = mysqli_fetch_object($result)){
	$comment = Comment::fromDB($row);
}
showLog('comment-code','',$comment);

// Load replies

$replies = ReplyManager::getRepliesByCommentId($comment->commentID);
showLog('comment-code','',$replies);

?>