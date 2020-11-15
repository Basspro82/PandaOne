<?php include 'header.php' ?>
<?php require 'my-friends-code.php' ?>

<script type="text/javascript" src="js/compatibility.js"></script>
<script type="text/javascript" src="vendor/circle-progress/circle-progress.js"></script>
<link href="vendor/circle-progress/circle-progress.css" rel="stylesheet">

    <main role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <div class="container">
          <h1 class="display-3">Mes amis</h1>
          <p>Retrouvez ici la liste de vos amis !</p>
        </div>
      </div>

      <div class="container">
        <!-- Example row of columns -->
        <div class="row">
          <div class="col-12">

            <div class="row">
              <?php if (isset($users)) { foreach ($users as $user) { ?>     
                <div class="col-3">
                  <?php require "_friendCard.php" ?>
                </div>
              <?php }} ?>
            </div><!--row-->

            <p><?php echo $message ?></p>

          </div>
        </row>

      </div> <!-- /container -->

    </main>

<?php include 'footer.php' ?>