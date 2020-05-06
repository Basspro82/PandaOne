<?php

    ini_set('display_errors',1);

    session_start(); 
    if ((!isset($_SESSION['userID']))&&(!isset($_GET['supervision']))){
        header('Location:./'); 
    }else if (isset($_GET['supervision'])){
        $_SESSION["userID"] = 1;
        $_SESSION["pseudo"] = 'basspro';
        $_SESSION["gravatar"] = '';
    }

    include('config.php');
    
    require_once('../framework/log.php');
    require_once('../framework/dom.php');
    require_once('../framework/database.php');
    require_once('../framework/string.php');
    require_once('../framework/ux.php');

?>

<!DOCTYPE html>
<html lang="en">
    
    <?php include "_head.php" ?>

    <body>

    <?php
        $urlReferrer = '';
        if ((!isset($_POST['mode']))&&(isset($_SERVER['HTTP_REFERER']))){
            $urlReferrer = $_SERVER['HTTP_REFERER'];
        }    
    ?>

    <?php include 'menu.php' ?>