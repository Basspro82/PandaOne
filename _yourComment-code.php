<?php

$showLog = false;
$imdbID = '';
$commentID = '';
$commentRaw = '';
$score = '';
$title = '';
$save = '';
$classFormTitle = '';
$classSearchBox = '';

showLog('yourComment-code.php','GET OBJECT',$_GET);
showLog('yourComment-code.php','POST OBJECT ',$_POST);

//Form configuration

if (isset($_GET['imdbID'])){ 
	$save = '';
	$classFormTitle = "";
	$classSearchBox = "d-none"; 
}else{ 
	$save = 'disabled';
	$classFormTitle = "d-none";
	$classSearchBox = "";
} 

//Load serie

if (isset($_GET['imdbID'])){
	$result = LoadAll("serie","imdbID = '" . $_GET["imdbID"] . "'");
	while($row = mysqli_fetch_object($result)){
		$serie = Serie::fromDB($row,0);
		$imdbID = $serie->imdbID;
		$title = $serie->title;
	}
}

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

// Save comment

if (isset($_POST['mode'])){

	if ($_POST['mode'] == 'comment'){

		showLog('yourComment-code.php','POST OBJECT ',$_POST);
			
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
		$comment->serie->plot = getElementByClassName('https://www.imdb.com/title/' . $_POST['imdbID'] . '/','div','summary_text'); 
		
		CommentManager::Add($comment);

		// Update DataBase Serie with Beta Series Data

		$url = "https://api.betaseries.com/shows/display?key=cabf2a885a7d&imdb_id=" . $comment->serie->imdbID;
		$strData = file_get_contents($url);
		$data = json_decode($strData);
	    SerieManager::UpdateFromBetaseries($data->show);

	    // Save Serie Pictures

	    saveImageFromUrl($data->show->images->poster,imgPhysicalPath . 'series/posters/' . $comment->serie->imdbID . '.jpg');
	    saveImageFromUrl($data->show->images->show,imgPhysicalPath . 'series/banners/' . $comment->serie->imdbID . '.jpg');

		// Send Administrator email

		sendPandaLog('Nouveau commentaire',$_SESSION["pseudo"] . ' a créé un commentaire pour la série ' . $_POST['title']);

		// Send notifications

		//User::sendNotifications($_SESSION['userID'],$comment->imdbID);

		$message = "Découvrez le commentaire laissé par " . $_SESSION["pseudo"] . " sur la série " . $comment->serie->title . " !";
		postOnFacebook(ROOTURL . Serie::getUrl($comment->serie->imdbID),$message);

		//header('Location:' . $_POST["urlReferrer"]);   

	}

}

?>