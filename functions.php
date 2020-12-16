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

function postOnFacebook($link,$message){

	$fb = new \Facebook\Facebook([
	  'app_id' => '227359608810773',           //Replace {your-app-id} with your app ID
	  'app_secret' => '7317758523cf5e87b037ad8de49379ed',   //Replace {your-app-secret} with your app secret
	  'graph_api_version' => 'v5.0',
	]);

	$linkData = [
	  'link' => $link,
	  'message' => $message
	];
	$pageAccessToken ='EAADOyEi4LRUBAPZBhxCr7ZCLC7TtrIzZBqmFiMo5u8444h2UikgjQo2k14tXfZCfW5Sy4qiekcLVFPzTWKjpzi0sBmeZBxZCiJEXxzCZCUDZB97DytVkZCPPztUsuZBFzsnodfEWr60LJrg5ZBWRorBm12nrCtAPK8jHFhPPkOxfDORTOI0eZATWAlOi';

	try {
	 $response = $fb->post('/me/feed', $linkData, $pageAccessToken);
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
	 echo 'Graph returned an error: '.$e->getMessage();
	 exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
	 echo 'Facebook SDK returned an error: '.$e->getMessage();
	 exit;
	}
	$graphNode = $response->getGraphNode();

}

?>