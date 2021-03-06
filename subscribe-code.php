<?php

/*****************************************/
/* REQUIRE */

require_once('config.php');
require_once(FRAMEWORKPATH . 'frameworks.php');
require_once('model/models.php');
require_once('manager/managers.php');
require_once('functions.php');

/*****************************************/

$showLog = false;
$bodyClass='subscribePage';

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
		$user->gravatar = '';

		if (UserManager::Add($user)){

			// Load New User

			$email = $user->email;

			$result = LoadAll('user',"email = '" . $email . "'");
			
			while($row = mysqli_fetch_object($result)){
				
				$user = User::fromDB($row,0);

				// Create new entry in communityUser

				CommunityUserManager::Add(1,$user);

				// Add User Friends

				User::addFriends($user);

				// Save picture

				$imgPath = imgPhysicalPath . 'avatars/' . $user->userID . '.png';

				if (gravatarExist($email)){
					$urlGravatar = getGravatar($email);
					saveImageFromUrl($urlGravatar,$imgPath);
				}else{
					//saveImageFromUrl('https://api.adorable.io/avatars/100/' . $email . '.png',$imgPath);
					copy(imgPhysicalPath . 'avatars/default.png',$imgPath);
				}

				// Send email

				sendPandaLog('Inscription',$email . ' s est inscrit sur le site.');

				// Connect user

				connectUser($user);

			}

		}else{
			$message = 'Un problème technique est survenu';
		}

	}
		
}

/*********************************/
/* SEO */
/*********************************/

$titlePage = "S'inscrire";
$descriptionPage = "S'inscrire";

?>