<?php

require_once "manager/userManager.php";
require_once "model/userModel.php";

$showLog = false;

$message = '';
$user = UserManager::GetCurrent();

if (isset($_POST['mode'])) {

    if ($_POST['mode'] == 'account'){

        $user = UserManager::GetCurrent();
        $user->pseudo = $_POST["pseudo"];
        $user->email = $_POST["email"];
        
        if ($_POST['password']) $user->password = $_POST['password'];
        
        $user->betaLogin = $_POST['betaLogin'];
        
        $user->notif = 0;
        if (isset($_POST['notif'])) $user->notif = 1;

        if (UserManager::Update($user)) {
            $_SESSION["userID"] = $user->userID;
            $_SESSION["pseudo"] = $user->pseudo;
            $_SESSION["gravatar"] = $user->gravatar;
            
            //if (!$showLog) header('Location:home');
        
            $message = "Vos informations ont été mises à jour.";
            $class="success";

        } else {
            $message = 'Un problème technique est survenu';
            $class="error";
        }

    }

}

?>