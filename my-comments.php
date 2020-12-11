<?php 
include '_init.php';
require 'my-comments-code.php'; 
?>

<?php include '_header.php'; ?>

    <main role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <div class="container-fluid">
          <h1 class="display-3">Mes commentaires</h1>
          <p>Vous pouvez ajouter, modifier ou supprimer vos commentaires !</p>
        </div>
      </div>

      <div class="container-fluid">
        <!-- Example row of columns -->
        <div class="row">
          <div class="col-12">

            <div class="row">
              <?php if (isset($comments)) { foreach ($comments as $comment) { ?>     
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 mb-4">
                  <?php require "commentCard.php" ?>
                </div>
              <?php }} ?>
            </div><!--row-->

            <p><?php echo $message ?></p>

          </div>
        </row>

      </div> <!-- /container -->

    </main>

<?php include '_footer.php' ?>