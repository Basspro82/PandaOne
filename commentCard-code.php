<?php

$showLog = false;

// Delete comment

if (isset($_POST['mode'])){
	CommentManager::Delete($_POST["imdbID"]);
}

//Load Replies

$replies = ReplyManager::getRepliesByCommentId($comment->commentID);

?>