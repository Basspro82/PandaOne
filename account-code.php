<?php

require_once "manager/userManager.php";
require_once "model/userModel.php";

$showLog = false;

$message = '';
$user = UserManager::GetCurrent();
if (isset($_POST['mode'])) {


    $user = UserManager::GetCurrent();
    $user->pseudo = $_POST["pseudo"];
    $user->email = $_POST["email"];
    if ($_POST['password'])
        $user->password = $_POST['password'];
    $user->betaLogin = $_POST['betaLogin'];
    if (UserManager::Update($user)) {
        $_SESSION["userID"] = $user->userID;
        $_SESSION["pseudo"] = $user->pseudo;
        $_SESSION["gravatar"] = $user->gravatar;
        header('Location:home');
    } else {
        $message = 'Un problème technique est survenu';
    }


}

?>