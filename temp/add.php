<?php require 'add-code.php' ?>

<?php include 'header.php' ?>

    <link href="./css/imdb-autocomplete.css" rel="stylesheet">

    <main role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <div class="container">
          <h1 class="display-3">Your comment</h1>
          <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
        </div>
      </div>

      <div class="container">
        <!-- Example row of columns -->

        <form action="add" method="post">
          <div class="container">
            <div class="searchArea row">
              <div class="col-8">
                <div class="form-group">
                  <?php 
                    if (isset($_GET['imdbID'])){ 
                    $disabled = '';
                  ?>
                    <input class="form-control" id="title" type="text" value="<?php echo $serie->title ?>" disabled>
                  <?php 
                    }else{ 
                      $disabled = 'disabled';
                  ?>  
                    <input class="form-control" id="searchBox" type="text" placeholder="enter a serie">
                  <?php } ?>
                  <div id="result"></div>
                </div>
              </div>
              <div class="col-4">
                <span class="preview"></span>
              </div>
            </div>
            <input type="hidden" name="mode" value="1">
            <input type="hidden" name="imdbID" id="imdbID" value="<?php echo $_GET['imdbID'] ?>">
            <input type="hidden" name="title" id="title">
            <input type="hidden" name="year" id="year">
            <input type="hidden" name="poster" id="poster">
            <input type="hidden" name="score" id="score">
            <input type="hidden" name="urlReferrer" value="<?php echo $urlReferrer; ?>">
            <div class="form-group">
              <div class="rate"></div>
            </div>
            <div class="form-group">
                <textarea class="form-control" type="text" name="comment" id="comment" placeholder="enter your comment"></textarea>
            </div>
            <input class="btn btn-primary btnSave" type="submit" name="btnSave" id="btnSave" value="Save" "<?php echo $disabled ?>">
          </div>
        </form>

      </div> <!-- /container -->

    </main>

    <script type="text/javascript" src="/js/add.js"></script>
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