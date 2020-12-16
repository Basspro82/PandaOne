<?php

require_once "manager/commentManager.php";
require_once "model/commentModel.php";

$showLog = false;

$page = 'my-comments';
$bodyClass='myComments';
$message = '';

$result = CommentManager::LoadAll('comment.userID = ' . $_SESSION["userID"]);
if ($result){
	while($row = mysqli_fetch_object($result)){
		$comment = Comment::fromDB($row);
		$comments[] = $comment;
	}
	showLog('my-comments-code','',$comments[0]);
}else{
	$message = "Vous n'avez pas de commentaire.";
}

/*********************************/
/* SEO */
/*********************************/

$titlePage = 'Mes commentaires';
$descriptionPage = 'Mes commentaires';

$ogTitle = '';
$ogUrl = '';
$ogImage = '';
$ogDescription = '';

?>