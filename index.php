<?php 
  ini_set('display_errors',1);
  require '../framework/log.php';
  require '../framework/database.php';
  require 'index-code.php'; 
?>
<!DOCTYPE html>
<html lang="en">
  
  <?php include "_head.php" ?>

  <body class="text-center loginPage">
    <form method="post" class="form">
      <input type="hidden" name="mode" value="1">
      <h1 class="h3 mb-3 font-weight-normal">Bienvenue sur</h1>
      <img class="mb-4" src="./images/logo-beta.png" alt="logo">
      <label for="email" class="sr-only">Email</label>
      <input type="email" id="email" name="email" class="form-control" placeholder="Email" required autofocus="">
      <br/>
      <label for="password" class="sr-only">Mot de passe</label>
      <input type="password" id="password" name="password" class="form-control" required placeholder="Password">
      <br/>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Se connecter</button>
      <a class="link mt-2" href="/subscribe.php">S'inscrire</a>
      <p><?php echo $message ?></p>
      <p class="mt-5 mb-3 text-muted">PandaOne © 2020</p>
    </form>

    <?php include "_scripts.php" ?>

  </body>
</html>