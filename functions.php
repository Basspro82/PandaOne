<?php

// ------------------------------
// Send LogMail
// ------------------------------
function sendPandaLog($subject,$message){
	sendMail('noreply@pandaone.fr','ylaurain@gmail.com','[PANDAONE] : ' . $subject,$message);
}

// ------------------------------
// Connect user on site
// ------------------------------
function connectUser($user){

	global $showLog;

	// Set session

	$_SESSION["userID"] = $user->userID;
	$_SESSION["pseudo"] = $user->pseudo;
	$_SESSION["gravatar"] = $user->gravatar;

	$friends = '';
	foreach ($user->friends as $friend) {
		if ($friends != '')$friends .= ', ';	
		$friends .= $friend->userID;
	}

	$_SESSION["friends"] = $friends;

	showLog('function.php','connectUser',$_SESSION);

	// Redirect user to home

	if (!$showLog) header('Location:home');

}

?>