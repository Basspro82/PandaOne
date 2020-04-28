<?php

include 'config.php';

require_once "manager/userManager.php";
require_once "model/userModel.php";

$showLog = false;

$message = '';

if (isset($_POST['mode'])){
		
	$email = $_POST["email"];
	
	$result = LoadAll('user',"email = '" . $email . "'");

	if (mysqli_num_rows($result)!=0) {
		
		// User already exist 
		
		$message = 'Cet email existe déjà dans le système';
		return;

	}else{

		// Create new user

		$user = new User();
		$user->pseudo = $_POST["pseudo"];	
		$user->email = $_POST["email"];
		$user->password = $_POST['password'];
		$user->betaLogin = $_POST['betaLogin'];
		if (UserManager::Add($user)){

			// TODO : Automatic connect new user

			header('Location:home');
		}else{
			$message = 'Un problème technique est survenu';
		}

	}
		
}

?>