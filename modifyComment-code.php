<?php

$showLog = false;
$bodyClass = 'modifyComment';

showLog('modifyComment-code.php','GET OBJECT',$_GET);
showLog('modifyComment-code.php','POST OBJECT ',$_POST); 

if (isset($_POST['mode'])){

	if ($_POST['mode'] == 'comment'){
			
		if ($_POST['commentID']!=''){
				
			// Update comment

			$comment = new Comment();
			$comment->commentID = $_POST['commentID'];
			$comment->imdbID = $_POST['imdbID'];
			$comment->userID = $_SESSION['userID'];
			$comment->comment = $_POST['comment'];
			$comment->score = $_POST['score'];
			CommentManager::Update($comment);

			header('Location:./my-comments'); 

		}   

	}

}else{

	$imdbID = '';
	$commentID = '';
	$commentRaw = '';
	$score = '';
	$title = '';
	$save = '';

	//Load comment

	if (isset($_GET['commentID'])){
		$result = CommentManager::LoadAll('comment.commentID = ' . $_GET["commentID"]);
		while($row = mysqli_fetch_object($result)){
			$comment = Comment::fromDB($row);
			$commentID = $comment->commentID;
			$commentRaw = $comment->comment;
			$score = $comment->score;
			$title = $comment->serie->title;
			$imdbID = $comment->serie->imdbID; 
		}
	}

	showLog('modifyComment-code.php','$comment',$comment);

}

/*********************************/
/* SEO */
/*********************************/

$ogTitle = '';
$ogUrl = '';
$ogImage = '';
$ogDescription = '';

?>