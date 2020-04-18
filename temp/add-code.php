<?php

include 'config.php';

require_once '../../framework/log.php';

require_once "manager/commentManager.php";
require_once "model/serieModel.php";
require_once "model/commentModel.php";

$showLog = true;

// Load Preselected Series if it is necessary

if (isset($_GET['imdbID'])){
	$result = LoadAll("serie","imdbID = '" . $_GET["imdbID"] . "'");
	while($row = mysqli_fetch_object($result)){
		$serie = Serie::fromDB($row,0);
	}
}

if (isset($_POST['mode'])){
	if ($_POST["mode"]==1){

		foreach($_POST as $key => $value) {
			$pos = strpos($key, "imdbID");
			if ($pos !== false) {
				
				// Enregistrement du commentaire

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

				showLog('add-code.php','',$comment);
				
				CommentManager::Add($comment);

				header('Location:' . $_POST["urlReferrer"]);    	
			}
		}
	}
}else{
	$urlReferrer = $_SERVER['HTTP_REFERER'];
}

showLog('add-code','',$_POST);

?>