<?php 
  include 'header.php';
  require 'series-code.php'; 
?>

    <main role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <div class="container">
          <h1 class="display-3">Series</h1>
          <p>La liste complètes des séries ajoutées par vous et vos amis !</p>
        </div>
      </div>

      <div class="container">
        <!-- Example row of columns -->

        <table id="series" class="display series">
          <thead>
              <tr>
                  <th></th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Année</th>
                  <th>Genre</th>
                  <th>Note moyenne</th>
                  <th>Visible sur</th>
              </tr>
          </thead>
          <tbody>
              <?php foreach ($series as $serie) { ?>    
              <tr>
                 <td><a href="./serie?imdbID=<?php echo $serie->imdbID ?>"><img src="<?php echo $serie->poster ?>" class="img-fluid" alt="<?php echo $serie->title ?>"></a></td> 
                 <td><?php echo $serie->title ?></td>
                 <td><?php echo $serie->plot ?></td>
                 <td><?php echo $serie->year ?></td>
                 <td><?php echo $serie->genres ?></td>
                 <td><?php echo round($serie->score,2) ?></td>
                 <td><?php
                     if ($serie->platform) {
                        echo "<a target='_blank' href='" . $serie->platformUrl . "'><img src='" . $serie->platformLogo ."'></a>";
                     }
                     ?></td>
              </tr>
              <?php } ?>
          </tbody>
        </table>    

      </div> <!-- /container -->

    </main>

    <script type="text/javascript">
        $(document).ready(function() {
          $('#series').DataTable({
            "language": {
                "url": "/js/dataTables.french.lang"
            }
          });
        });
    </script>

<?php include 'footer.php' ?>