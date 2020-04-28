<?php 

  include 'header.php';
  require 'home-code.php';

?>

    <main role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <div class="container">
          <h1 class="display-3">Bienvenue</h1>
          <p>Partagez avec vos amis les commentaires sur vos séries préférées !</p>
          <p><a class="btn btn-primary btn-lg" href="./yourComment" role="button">Ajouter un commentaire +</a></p>
        </div>
      </div>

      <div class="container">
        <!-- Example row of columns -->
        <div class="row">
          <div class="col-12">
        <h2>Quoi de neuf ?</h2>  

        <div class="row">
        <?php foreach ($comments as $comment) { ?>     
            <div class="col-12">
              <?php require "commentCard.php" ?>
            </div>
          <?php } ?>
          </div><!--row-->
          <?php echo $pagination ?>
          </div>
        </div>

      </div> <!-- /container -->

    </main>

<?php include 'footer.php' ?>