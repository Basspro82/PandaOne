<?php 
  ini_set('display_errors',1);
  require '../framework/log.php';
  require '../framework/database.php';
  require 'subscribe-code.php'; 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">

    <title>PandaOne</title>

    <link rel="canonical" href="#">
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/signin.css" rel="stylesheet">
    <link href="./css/main.css" rel="stylesheet">

  </head>

  <body class="text-center">
    <form action="subscribe.php" method="post" class="form-signin">
      <input type="hidden" name="mode" value="1">
      <img class="mb-4" src="./images/logo.png" alt="logo">
      <p>Merci de renseigner les champs suivants : </p>
      
      <label for="pseudo" class="sr-only">Email</label>
      <input type="pseudo" id="pseudo" name="pseudo" class="form-control" placeholder="Pseudo *" required autofocus="">
      <br/>
      
      <label for="email" class="sr-only">Email</label>
      <input type="email" id="email" name="email" class="form-control" placeholder="Email *" required autofocus="">
      <br/>
      
      <label for="password" class="sr-only">Mot de passe</label>
      <input type="password" id="password" name="password" class="form-control" placeholder="Mot de passe *" required>
      <br/>

      <label for="betaLogin" class="sr-only">BetaSeries login</label>
      <input id="betaLogin" name="betaLogin" class="form-control" placeholder="BetaSeries login">
      <br/>

      <button class="btn btn-lg btn-primary btn-block" type="submit">S'inscrire</button>
      <p class="text-left mt-2 mb-2">
        * Champs obligatoires<br/>
        <?php echo $message ?>
      </p>
      <p class="mt-5 mb-3 text-muted">PandaOne © 2020</p>
    </form>
  </body>
</html>