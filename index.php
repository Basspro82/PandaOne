<?php
  session_start();
  require_once('config.php');
  require_once(FRAMEWORKPATH . 'frameworks.php');
  require_once('model/models.php');
  require_once('manager/managers.php');
  require_once('functions.php');
  require_once ('_yourComment-code.php');
  require 'index-code.php'; 
?>

<?php include "_header.php" ?>

<form method="post" class="form">
  <input type="hidden" name="mode" value="1">
  <h1 class="h3 mb-3 font-weight-normal">Bienvenue sur</h1>
  <img class="mb-4" src="./images/logo.png" alt="logo">
  <label for="email" class="sr-only">Email</label>
  <input type="email" id="email" name="email" class="form-control" placeholder="Email" required autofocus="">
  <br/>
  <label for="password" class="sr-only">Mot de passe</label>
  <input type="password" id="password" name="password" class="form-control" required placeholder="Password">
  <br/>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Se connecter</button>
  <a class="link mt-2" href="./subscribe.php">S'inscrire</a>
  <p><?php echo $message ?></p>
</form>

<?php include "_footer.php" ?>