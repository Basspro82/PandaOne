<?php

include 'config.php';

require_once "manager/userManager.php";
require_once "model/userModel.php";

require_once "../framework/gravatar.php";
require_once "../framework/image.php";

$showLog = false;

$message = '';

if (isset($_POST['mode'])) {

    $email = $_POST["email"];

    $result = LoadAll('user', "email = '" . $email . "'");

    if (mysqli_num_rows($result) != 0) {

        // User already exist

        $message = 'Cet email existe déjà dans le système';
        return;

    } else {

        // Create new user

        $user = new User();
        $user->pseudo = $_POST["pseudo"];
        $user->email = $_POST["email"];
        $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $user->betaLogin = $_POST['betaLogin'];
        $user->gravatar = '';

        if (UserManager::Add($user)) {

            $email = $user->email;

            // Load New User

            $result = LoadAll('user', "email = '" . $email . "'");

            while ($row = mysqli_fetch_object($result)) {

                $user = User::fromDB($row, 0);

                // Save picture

                $imgPath = imgPhysicalPath . 'avatars\\' . $user->userID . '.png';

                if (gravatarExist($email)) {
                    $urlGravatar = getGravatar($email);
                    saveImageFromUrl($urlGravatar, $imgPath);
                } else {
                    saveImageFromUrl('https://api.adorable.io/avatars/100/' . $email . '.png', $imgPath);
                }

                // connect new user to his home

                $_SESSION['userID'] = $user->userID;

                header('Location:home');

            }

        } else {
            $message = 'Un problème technique est survenu';
        }

    }

}

?>