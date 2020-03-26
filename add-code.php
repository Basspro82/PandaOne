<?php

include 'config.php';

require_once '../../framework/log.php';

require_once "manager/commentManager.php";
require_once "model/serie.php";
require_once "model/comment.php";

$showLog = true;

if (isset($_POST['mode'])){
	if ($_POST["mode"]==1){
		
		// Mise à jour des titres des vidéos
		foreach($_POST as $key => $value) {
			$pos = strpos($key, "imdbID");
			if ($pos !== false) {
				
				// Enregistrement du commentaire

				$comment = new Comment();
				$comment->imdbID = $_POST['imdbID'];
				$comment->userID = 1;
				$comment->comment = $_POST['comment'];
				$comment->serie = new Serie();
				$comment->serie->imdbID = $_POST['imdbID'];
				$comment->serie->title = $_POST['title'];
				$comment->serie->year = $_POST['year'];
				$comment->serie->poster = $_POST['poster']; 

				showLog('add-code.php','',$comment);
				
				CommentManager::Add($comment);

			}
		}
	}
}

showLog('add-code','',$_POST);

?>