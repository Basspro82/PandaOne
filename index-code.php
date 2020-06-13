<?php

include 'config.php';

require_once "manager/commentManager.php";
require_once "manager/communityUserManager.php";

require_once "model/serieModel.php";
require_once "model/commentModel.php";
require_once "model/userModel.php";
require_once "model/communityUserModel.php";

require_once('functions.php');

$showLog = false;

$message = '';
if (isset($_POST['mode'])){
	if ($_POST["mode"]==1){
		
		$email = $_POST["email"];
		$password = $_POST["password"];

		$result = LoadAll('user',"email = '" . $email . "' AND password = '" . $password . "'", 'email');
		if ($result && $result->num_rows != 0) {
			
			while($row = mysqli_fetch_object($result)){
				$user = User::fromDB($row,0);
			}

			connectUser($user);

		}else{
			$message = 'utilisateur inconnu';
		}
		
	}
}

?>