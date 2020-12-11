<!DOCTYPE html>
<html>
<head>
  <title>
    My Name 
  </title>
</head>

<body>
  <h1>Get My Name from Facebook</h1>

<?php

require_once '../vendor/facebook/php-graph-sdk/src/Facebook/autoload.php';   

$fb = new \Facebook\Facebook([
  'app_id' => '227359608810773',           //Replace {your-app-id} with your app ID
  'app_secret' => '7317758523cf5e87b037ad8de49379ed',   //Replace {your-app-secret} with your app secret
  'graph_api_version' => 'v5.0',
]);


try {
   
// Get your UserNode object, replace {access-token} with your token
  $response = $fb->get('/me', 'EAADOyEi4LRUBAFkgy8zKx3bKvk8rh3cr12whh6K9y9YNHptPKIXYXcdwmy8QdbNRPJUMUBPxrLY65SwXwSLlzi2FAyAac2TOXRGYUROamUSi2TJOZC5Kj5i6dZBjPXW8t5PCeknZCT4ZBcEpZBm2Fs6wDRwwaX5AWBIAQnCbEA0ZA4zt0BCgQpxTed1Li3bFgtCH2fKvHzojBK73LLaIuuq8sXvi5MUFymCt53nzdpVAZDZD');

} catch(\Facebook\Exceptions\FacebookResponseException $e) {
        // Returns Graph API errors when they occur
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(\Facebook\Exceptions\FacebookSDKException $e) {
        // Returns SDK errors when validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

$me = $response->getGraphUser();

       //All that is returned in the response
echo 'All the data returned from the Facebook server: ' . $me;

       //Print out my name
echo 'My name is ' . $me->getName();


//Post property to Facebook
$linkData = [
  'link' => 'www.pandaone.fr',
  'message' => '1er message'
];
$pageAccessToken ='EAADOyEi4LRUBAAZBqjK4QOCuFQwKVRD0WWC6uTIsqTi9jbMU355YeGm6ETcJdjoLG20UmjraeXTxY6qG3GlwHGNzsZAVX6cAOE9rgqEXdCFPqndU3mVR2m773s3t6vMpGXYtOADwDoRVWlv09xBlHsljiZAYazGgAT8IZB0b3ZA2gzZC4N9xY3y8PdozCFRL9t6srRZAHNmEwZDZD';

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

?>

</body>
</html>