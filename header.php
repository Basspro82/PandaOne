<?php 
    session_start(); 
    if (!isset($_SESSION['userID'])){
        header('Location:./'); 
    }
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
        <link href="./css/main.css" rel="stylesheet">

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