<?php 
  ini_set('display_errors',1);
  require '../framework/log.php';
  require '../framework/database.php';
  require 'subscribe-code.php'; 
?>
<!DOCTYPE html>
<html lang="en">
  
  <?php include "_head.php" ?>

  <body class="text-center subscribePage">
    <form action="subscribe.php" method="post" class="form">
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

      <label for="betaLogin" class="sr-only">Login Betaseries</label>
      <div class="input-group">   
        <div class="input-group-prepend">
          <div class="input-group-text info" data-toggle="popover" title="Betaseries" data-html="true" data-placement="right" data-content="<?php require '_betaseries_desc.php'; ?>">?</div>
          </div>
        <input id="betaLogin" name="betaLogin" class="form-control" placeholder="Login BetaSeries">
      </div>
      <br/>

        <button class="btn btn-lg btn-primary btn-block" type="submit">S'inscrire</button>
      <p class="text-left mt-2 mb-2">
        * Champs obligatoires<br/>
        <?php echo $message ?>
      </p>
      <p class="mt-5 mb-3 text-muted">PandaOne © 2020</p>
    </form>

    <?php include "_scripts.php" ?>

  </body>
</html>