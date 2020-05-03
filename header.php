<?php

    ini_set('display_errors',1);

    session_start(); 
    if ((!isset($_SESSION['userID']))&&(!issset($_GET['supervision']))){
        header('Location:./'); 
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