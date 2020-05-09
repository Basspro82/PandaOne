<?php

include 'config.php';

require_once "manager/commentManager.php";
require_once "model/serieModel.php";
require_once "model/commentModel.php";

$showLog = false;

$message = '';
if (isset($_POST['mode'])) {
    if ($_POST["mode"] == 1) {

        $email = $_POST["email"];
        $password = $_POST["password"];

        $result = LoadAll('user', "email = '" . $email . "'", 'email');
        if ($result && $result->num_rows != 0) {


            while ($row = mysqli_fetch_object($result)) {
                $user = User::fromDB($row, 0);
            }

            // check du mdp
            if (password_verify($password, $user->password)) {

                session_start();
                $_SESSION["userID"] = $user->userID;
                $_SESSION["pseudo"] = $user->pseudo;
                $_SESSION["gravatar"] = $user->gravatar;
                header('Location:home');
            } else {
                $message = "Email ou mot de passe incorrect";
            }


        } else {
            $message = "Email ou mot de passe incorrect";

        }

    }
}

?>