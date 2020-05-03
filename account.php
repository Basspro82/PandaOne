<?php include 'header.php' ?>
<?php require 'account-code.php' ?>

<main role="main">

    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">Mon compte</h1>
        </div>
    </div>

    <div class="container">
    <form method="post" class="form">
      <input type="hidden" name="mode" value="1">

      <label for="pseudo" >Pseudo *</label>
      <input type="pseudo" id="pseudo" name="pseudo" class="form-control" value="<?php echo $user->pseudo; ?>" required autofocus="">
      <br/>
      
      <label for="email" >Email *</label>
      <input type="email" id="email" name="email" class="form-control" value="<?php echo $user->email; ?>"  required autofocus="">
      <br/>
      
      <label for="password">Nouveau mot de passe</label>
      <input type="password" id="password" name="password" class="form-control" >
      <br/>

      <label for="betaLogin" >Login Betaseries</label>
      <div class="input-group">   
          <div class="input-group-prepend">
            <div class="input-group-text info" data-toggle="popover" title="Betaseries" data-html="true" data-placement="right" data-content="<?php
            require '_betaseries_desc.php'; ?>">?</div>
          </div>
          <input id="betaLogin" name="betaLogin" class="form-control" value="<?php echo $user->betaLogin; ?>" >
      </div>
      <br/>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Mettre à jour</button>
      <p class="text-left mt-2 mb-2">
        * Champs obligatoires<br/>
        <?php echo $message ?>
      </p>
    </form>
    </div>
</main>

<?php include 'footer.php' ?>