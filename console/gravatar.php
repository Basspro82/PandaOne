<?php

ini_set('display_errors',1);

require_once "../config.php";

require_once "../../framework/gravatar.php";
require_once "../../framework/image.php";

$email = 'mesletfaustine@gmail.com';

if (gravatarExist($email)){
	echo 'Gravatar found';
	$urlGravatar = getGravatar($email);
	saveImageFromUrl($urlGravatar,imgVirtualPath . '999.png');
}else{
	echo 'Gravatar not found';
	print_r(file_get_contents('https://api.adorable.io/avatars/100/' . $email . '.png'));
	saveImageFromUrl('https://api.adorable.io/avatars/100/' . $email . '.png',imgVirtualPath . '999.png');
}

?>