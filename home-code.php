<?php

require_once "manager/commentManager.php";
require_once "manager/communityUserManager.php";

require_once "model/commentModel.php";
require_once "model/communityUserModel.php";

$showLog = false;
$page = 'home';
$bodyClass = 'home';

$nbComments = 12;

$pageCourante = 1;
if (isset($_GET["page"])) $pageCourante = $_GET["page"];

$result = CommentManager::LoadAll('',$nbComments,$pageCourante);
while($row = mysqli_fetch_object($result)){
	$comment = Comment::fromDB($row);
	$comments[] = $comment;
}

$pagination = GetPagination("/home",$result,$nbComments,$pageCourante);

/*********************************/
/* SEO */
/*********************************/

$titlePage = 'Bienvenue sur PandaOne';
$descriptionPage = 'Les dernières actus séries de votre communauté';

$ogTitle = 'Bienvenue sur PandaOne';
$ogUrl = ROOTURL;
$ogImage = ROOTURL . 'images/icon4.png';
$ogDescription = 'Bienvenue sur pandaOne';

showLog('home-code','',$comments);

?>