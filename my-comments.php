<?php include 'header.php' ?>
<?php require 'my-comments-code.php' ?>

    <main role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <div class="container">
          <h1 class="display-3">Mes commentaires</h1>
          <p>Vous pouvez ajouter, modifier ou supprimer vos commentaires !</p>
          <p><a class="btn btn-primary btn-lg" href="./yourComment" role="button">Ajouter un commentaire +</a></p>
        </div>
      </div>

      <div class="container">
        <!-- Example row of columns -->
        <div class="row">
          <div class="col-12">

            <div class="row">
              <?php if (isset($comments)) { foreach ($comments as $comment) { ?>     
                <div class="col-12">
                  <?php require "commentCard.php" ?>
                </div>
              <?php }} ?>
            </div><!--row-->

            <p><?php echo $message ?></p>

          </div>
        </row>

      </div> <!-- /container -->

    </main>

<?php include 'footer.php' ?>