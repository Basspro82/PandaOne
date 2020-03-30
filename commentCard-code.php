<?php

require_once "manager/commentManager.php";

$showLog = false;

if (isset($_POST['mode'])){
	CommentManager::Delete($_POST["imdbID"]);
}

?>