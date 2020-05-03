<?php 


$_SESSION["userID"] = 1;
$_SESSION["pseudo"] = 'basspro';
$_SESSION["gravatar"] = '';
$url = 'http://www.pandaone.local:8080/comment.php?commentID=68?supervision=1';
print_r(get_headers($url));


//if(stripos($headers[0], '404 NOT FOUND')
//   || stripos($headers[0], '500 Internal Server Error'))

?>