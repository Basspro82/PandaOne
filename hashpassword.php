<?php

include 'config.php';

require_once '../framework/log.php';
require_once "../framework/database.php";
require_once "manager/userManager.php";

$showLog = false;

$sql = "ALTER TABLE user MODIFY COLUMN password NVARCHAR(255)";
ExecuteQuery($sql);

$result = LoadAll('user',"", 'email');
while ($user = mysqli_fetch_object($result)) {
    echo $user->password . " => " . password_hash($user->password,PASSWORD_DEFAULT) . "<br>";
    UserManager::Update($user, $user->password);
}

?>