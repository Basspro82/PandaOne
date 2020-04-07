<?php

include 'config.php';

require_once "manager/commentManager.php";
require_once "model/serieModel.php";
require_once "model/commentModel.php";

$showLog = false;
$imdbID = '';
$commentID = '';
$commentRaw = '';
$score = '';

//Load serie

if (isset($_GET['imdbID'])){
	$result = LoadAll("serie","imdbID = '" . $_GET["imdbID"] . "'");
	while($row = mysqli_fetch_row($result)){
		$serie = Serie::fromDB($row,0);
		$imdbID = $serie->imdbID;
		$title = $serie->title;
	}
}

//Load comment

if (isset($_GET['commentID'])){
	$result = CommentManager::LoadAll('comment.commentID = ' . $_GET["commentID"]);
	while($row = mysqli_fetch_row($result)){
		$comment = Comment::fromDB($row);
		$commentID = $comment->commentID;
		$commentRaw = $comment->comment;
		$score = $comment->score;
		$title = $comment->serie->title;
		$imdbID = $comment->serie->imdbID; 
	}
}

// Save comment

if (isset($_POST['mode'])){

	showLog('comment-code.php','POST OBJECT ',$_POST);

	if ($_POST["mode"]==1){
		
		if ($_POST['commentID']!=''){
				
			// Update comment

			$comment = new Comment();
			$comment->commentID = $_POST['commentID'];
			$comment->imdbID = $_POST['imdbID'];
			$comment->userID = $_SESSION['userID'];
			$comment->comment = $_POST['comment'];
			$comment->score = $_POST['score'];
			CommentManager::Update($comment);

		}else{
			
			//Create comment

			$comment = new Comment();
			$comment->imdbID = $_POST['imdbID'];
			$comment->userID = $_SESSION['userID'];
			$comment->comment = $_POST['comment'];
			$comment->score = $_POST['score'];	

			$comment->serie = new Serie();
			$comment->serie->imdbID = $_POST['imdbID'];
			$comment->serie->title = $_POST['title'];
			$comment->serie->year = $_POST['year'];
			$comment->serie->poster = $_POST['poster']; 
			
			CommentManager::Add($comment);

		}

		header('Location:' . $_POST["urlReferrer"]);   

	}
}

?>