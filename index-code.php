<?php

include 'config.php';

require_once '../../framework/log.php';

require_once "manager/commentManager.php";
require_once "model/serieModel.php";
require_once "model/commentModel.php";
require_once "../../framework/gravatar.php";

$showLog = true;

$message = '';

if (isset($_POST['mode'])){
	if ($_POST["mode"]==1){
		
		$email = $_POST["email"];
		$password = $_POST["password"];

		$result = LoadAll('user',"email = '" . $email . "' AND password = '" . $password . "'", 'email');
		if (mysqli_num_rows($result)!=0) {
			
			while($row = mysqli_fetch_row($result)){
				$user = User::fromDB($row,0);
			}

			session_start();
			$_SESSION["userID"] = $user->userID;
			$_SESSION["pseudo"] = $user->pseudo;
			$_SESSION["gravatar"] = $user->gravatar;
			header('Location:home');

		}else{
			$message = 'utilisateur inconnu';
		}
		
	}
}

?>