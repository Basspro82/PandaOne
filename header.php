<?php

    /*****************************************/
    /* REQUIRE */

    require_once('config.php');
    require_once(FRAMEWORKPATH . 'frameworks.php');
    require_once('model/models.php');
    require_once('manager/managers.php');
    require_once('functions.php');
    require_once ('_yourComment-code.php');

    /*****************************************/

    ini_set('display_errors',1);

    session_start(); 

    if ((!isset($_SESSION['userID']))&&(env != 'dev')){

        header('Location:./'); 
    
    }else if (env == 'dev'){
        
        $_SESSION["userID"] = 1;
        $_SESSION["pseudo"] = 'basspro';
        $_SESSION["gravatar"] = '';
        $_SESSION["friends"] = '1,2,3';
    
    }

?>

<!DOCTYPE html>
<html lang="fr">
    
    <?php include "_head.php" ?>

    <body>

    <?php
        $urlReferrer = '';
        if ((!isset($_POST['mode']))&&(isset($_SERVER['HTTP_REFERER']))){
            $urlReferrer = $_SERVER['HTTP_REFERER'];
        }    
    ?>

    <?php include 'menu.php' ?>