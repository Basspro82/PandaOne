<?php require 'home-code.php' ?>

<?php include 'header.php' ?>

    <main role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <div class="container">
          <h1 class="display-3">Home</h1>
          <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
          <p><a class="btn btn-primary btn-lg" href="./yourComment" role="button">Add comment +</a></p>
        </div>
      </div>

      <div class="container">
        <!-- Example row of columns -->
        <div class="row">
          <div class="col-12">
        <h2>Last comments</h2>  

        <div class="row">
        <?php foreach ($comments as $comment) { ?>     
            <div class="col-12">
              <?php require "commentCard.php" ?>
            </div>
            <?php } ?>
          </div><!--row-->
          </div>
        </div>

      </div> <!-- /container -->

    </main>

<?php include 'footer.php' ?>