<?php include 'header.php' ?>
<?php require 'yourComment-code.php' ?>

    <link href="./css/imdb-autocomplete.css" rel="stylesheet">

    <main role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <div class="container">
          <h1 class="display-3">Votre commentaire</h1>
          <p>Partager votre point de vue en quelques clics !</p>
        </div>
      </div>

      <div class="container">
        <!-- Example row of columns -->

        <form action="yourComment" method="post">
          <div class="container">
            <div class="searchArea row">
              <div class="col-8">
                <div class="form-group">
                  <?php 
                    if (isset($_GET['imdbID']) || isset($_GET['commentID'])){ 
                    $save = '';
                  ?>
                    <input class="form-control" id="title" type="text" value="<?php echo $title ?>" disabled>
                  <?php 
                    }else{ 
                      $save = 'disabled';
                  ?>  
                    <input class="form-control" id="searchBox" type="text" placeholder="entrer une série">
                  <?php } ?>
                  <div id="result"></div>
                </div>
              </div>
              <div class="col-4">
                <span class="preview"></span>
              </div>
            </div>
            
            <input type="hidden" name="mode" value="1">
            <input type="hidden" name="urlReferrer" value="<?php echo $urlReferrer ?>">

            <input type="hidden" name="imdbID" id="imdbID" value="<?php echo $imdbID ?>">
            <input type="hidden" name="title" id="title">
            <input type="hidden" name="year" id="year">
            <input type="hidden" name="poster" id="poster">
            <input type="hidden" name="score" id="score">
            <input type="hidden" name="commentID" value="<?php echo $commentID ?>">

            <div class="form-group">
              <div class="rate" data-rate-value="<?php echo $score ?>"></div>
            </div>
            <div class="form-group">
                <textarea class="form-control" type="text" name="comment" id="comment" placeholder="entrer votre commentaire"><?php echo $commentRaw ?></textarea>
            </div>
            <div class="btn-group" role="group" aria-label="Action">
              <input class="btn btn-primary btnSave" type="submit" name="btnSave" id="btnSave" value="Enregistrer" <?php echo $save ?>>
              <a class="btn btn-secondary btnCancel" href="<?php echo $urlReferrer ?>">Annuler</a>
            </div>
          </div>
        </form>

      </div> <!-- /container -->

    </main>

    <script type="text/javascript" src="./js/add.js"></script>
    <script type="text/javascript" src="./js/rater.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
            var options = {
                max_value: 5,
                step_size: 0.5,
                selected_symbol_type: 'utf8_star',
                initial_value: 0,
                update_input_field_name: $("#score"),
            }
            $(".rate").rate(options);
      });
    </script>
<?php include 'footer.php' ?>