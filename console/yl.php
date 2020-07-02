<?php

    include('../config.php');
    include ('../../framework/frameworks.php');
    include "../manager/managers.php";
	include "../model/models.php";

    $showLog = true;

    session_start();
    $_SESSION["userID"] = 1;
    $_SESSION["pseudo"] = 'basspro';
    $_SESSION["friends"] = '1,2';

    User::sendNotifications(1,'tt2261227');
	
?>