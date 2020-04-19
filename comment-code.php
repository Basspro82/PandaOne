<?php

include 'config.php';

require_once '../../framework/log.php';

require_once "manager/commentManager.php";
require_once "model/commentModel.php";

require_once "manager/replyManager.php";
require_once "model/replyModel.php";

$showLog = false;
$page = "comment";

// Save comment

if (isset($_POST['mode'])){

	showLog('comment-code.php','POST OBJECT ',$_POST);

	$reply = new Reply();
	$reply->commentID = $_POST['commentID'];
	$reply->userID = $_SESSION['userID'];
	$reply->body = $_POST['body'];
	ReplyManager::Add($reply);

}

// Load comment

$result = CommentManager::LoadOne($_GET['commentID']);
while($row = mysqli_fetch_row($result)){
	$comment = Comment::fromDB($row);
}
showLog('comment-code','',$comment);

// Load replies

$replies = ReplyManager::getRepliesByCommentId($comment->commentID);
showLog('comment-code','',$replies);

?>