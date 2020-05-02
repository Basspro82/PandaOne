<?php

    ini_set('display_errors',1);

    session_start(); 
    if (!isset($_SESSION['userID'])){
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
    <head>
        
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>PandaOne</title>

        <link rel="canonical" href="#">

        <link href="./vendor/bootstrap-4.4.1-dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="./css/jumbotron.css" rel="stylesheet">
        <link href="./css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="./vendor/fontawesome-free-5.13.0-web/css/all.css" rel="stylesheet">

        <link href="./css/main.css" rel="stylesheet">

        <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
		<link rel="manifest" href="/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">

        <script src="./js/jquery-3.4.1.js"></script>

    </head>

    <body>

    <?php
        $urlReferrer = '';
        if ((!isset($_POST['mode']))&&(isset($_SERVER['HTTP_REFERER']))){
            $urlReferrer = $_SERVER['HTTP_REFERER'];
        }    
    ?>

    <?php include 'menu.php' ?>