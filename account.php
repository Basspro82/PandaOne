<?php include 'header.php' ?>
<?php require 'account-code.php' ?>

<main role="main">

    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">Mon compte</h1>
        </div>
    </div>

    <div class="container">
    <form method="post" class="form-signin">
      <input type="hidden" name="mode" value="1">

      <label for="pseudo" >Pseudo</label>
      <input type="pseudo" id="pseudo" name="pseudo" class="form-control" value="<?php echo $user->pseudo; ?>" required autofocus="">
      <br/>
      
      <label for="email" >Email</label>
      <input type="email" id="email" name="email" class="form-control" value="<?php echo $user->email; ?>"  required autofocus="">
      <br/>
      
      <label for="password">Nouveau mot de passe</label>
      <input type="password" id="password" name="password" class="form-control" >
      <br/>

      <label for="betaLogin" >Login Betaseries</label>
      <input id="betaLogin" name="betaLogin" class="form-control" value="<?php echo $user->betaLogin; ?>" >
        <a href="https://www.betaseries.com/" target="_blank">pas encore de compte ?</a>
        <br/>
        <br/>

        <button class="btn btn-lg btn-primary btn-block" type="submit">S'inscrire</button>
      <p class="text-left mt-2 mb-2">
        * Champs obligatoires<br/>
        <?php echo $message ?>
      </p>
      <p class="mt-5 mb-3 text-muted">PandaOne © 2020</p>
    </form>
    </div>
</main>

<?php include 'footer.php' ?>