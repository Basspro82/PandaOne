<?php

$showLog = false;
$bodyClass = 'text-center loginPage';

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