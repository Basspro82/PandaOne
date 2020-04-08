<?php require 'serie-code.php' ?>

<?php include 'header.php' ?>

    <main role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <div class="container">
          <h1 class="display-3"><?php echo $serie->title ?></h1>
          <div class="row">
            <div class="col-3 seriePoster">
              <img src="<?php echo $serie->poster ?>"/>
            </div>
            <div class="col">
              <div class="rateRO" data-rate-value="<?php echo $averageRate ?>"></div>
              <p><?php echo $serie->plot ?></p>
              <span class="serie-yearAndGenre"><?php echo $serie->year ?></span>
              <p><a class="btn btn-primary btn-lg" href="./comment?imdbID=<?php echo $serie->imdbID ?>" role="button">Add comment +</a></p>
            </div>
          </div>
        </div>
      </div>

      <div class="container">
        <!-- Example row of columns -->
        <div class="row">
          <div class="col-12">

        <div class="row">
        <?php foreach ($serie->comments as $comment) { ?>

            <div class="col-12">
              <?php require "commentCard.php" ?>
            </div>
            <?php } ?>
          </div><!--row-->
          </div>
        </row>

      </div> <!-- /container -->

    </main>

<?php include 'footer.php' ?>