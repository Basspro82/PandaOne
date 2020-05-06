<?php include 'header.php' ?>
<?php require 'betaseries-code.php' ?>

    <main role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <div class="container">
          <h1 class="display-3">Derniers épisodes vus</h1>
        </div>
      </div>

      <div class="container">
        <!-- Example row of columns -->
        <div class="row">
          <div class="col-12">

            <div class="row">
              <?php if (isset($events)) { foreach ($events as $event) { ?>
                <div class="col-12">
                  <?php require "_betaseriesCard.php" ?>
                </div>
              <?php }} ?>
            </div><!--row-->

          </div>
        </row>

      </div> <!-- /container -->

    </main>

<?php include 'footer.php' ?>