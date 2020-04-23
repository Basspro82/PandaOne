<?php

require_once "manager/commentManager.php";
require_once "model/commentModel.php";

$showLog = false;
$page = 'home';

$nbComments = 10;

$pageCourante = 1;
if (isset($_GET["page"])) $pageCourante = $_GET["page"];

$result = CommentManager::LoadAll('',$nbComments,$pageCourante);
while($row = mysqli_fetch_object($result)){
	$comment = Comment::fromDB($row);
	$comments[] = $comment;
}

$pagination = GetPagination("/home",$result,10,$pageCourante);

showLog('home-code','',$comments[0]);

?>