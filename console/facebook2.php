<?php

require_once('../config.php');
require_once('../../framework/log.php');
require_once('../../framework/database.php');
require_once('../model/serieModel.php');
require_once('../model/communityUserModel.php');
require_once('../model/userModel.php');
require_once "../functions.php";
require_once "../manager/serieManager.php";
require_once "../manager/communityUserManager.php";
require_once "../manager/userManager.php";
require_once '../vendor/facebook/php-graph-sdk/src/Facebook/autoload.php';   

$result = LoadOne('user','userID',1);
while($row = mysqli_fetch_object($result)){
  $user = User::fromDB($row,0);
}

$result = LoadOne('serie','serie.imdbID',"'tt2560140'");
while($row = mysqli_fetch_object($result)){
  $serie = Serie::fromDB($row,0);
}

$message = "Découvrez le commentaire laissé par " . $user->pseudo . " sur la série " . $serie->title; 

postOnFacebook(ROOTURL . $serie->url,$message);

?>