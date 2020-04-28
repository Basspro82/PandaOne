<?php

require_once "manager/userManager.php";
require_once "model/userModel.php";

$showLog = false;

$page = 'my-friends';
$message = '';

$result = UserManager::LoadAll();
if ($result){
	while($row = mysqli_fetch_object($result)){
		$user = User::fromDB($row,0);
		$users[] = $user;
	}
	showLog('my-friends-code','',$users[0]);
}else{
	$message = "Vous n'avez pas de commentaire.";
}

?>