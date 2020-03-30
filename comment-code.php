<?php

include 'config.php';

require_once '../../framework/log.php';

require_once "manager/commentManager.php";
require_once "model/serieModel.php";
require_once "model/commentModel.php";

$showLog = false;

//Load comment

$result = CommentManager::LoadAll('comment.commentID = ' . $_GET["commentID"]);
while($row = mysqli_fetch_row($result)){
	$comment = Comment::fromDB($row);
}

// Save comment

if (isset($_POST['mode'])){
	if ($_POST["mode"]==1){
		
		// Mise à jour des titres des vidéos
		foreach($_POST as $key => $value) {
			$pos = strpos($key, "imdbID");
			if ($pos !== false) {
				
				// Enregistrement du commentaire

				$comment = new Comment();
				$comment->commentID = $_POST['commentID'];
				$comment->imdbID = $_POST['imdbID'];
				$comment->userID = 1;
				$comment->comment = $_POST['comment'];
				
				showLog('add-code.php','',$comment);
				
				CommentManager::Update($comment);

				header('Location:my-comments');      

			}
		}
	}
}

showLog('add-code','',$_POST);

?>