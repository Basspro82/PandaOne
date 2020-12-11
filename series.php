<?php 
include '_init.php';
require 'series-code.php'; 
?>

<?php include '_header.php'; ?>

    <main role="main" class="seriesPage">

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
                  <th>Titre</th>
                  <th class="d-none d-sm-table-cell">Année</th>
                  <th class="d-none d-sm-table-cell">Genre</th>
                  <th>Note moyenne</th>
                  <th class="d-none d-sm-table-cell">Visible sur</th>
              </tr>
          </thead>
          <tbody>
              <?php foreach ($series as $serie) { ?>    
              <tr>
                <td>
                  <a href="./serie?imdbID=<?php echo $serie->imdbID ?>"><img src="<?php echo $serie->poster ?>" class="img-fluid" alt="<?php echo $serie->title ?>"></a>
                </td> 
                <td class="title"><?php echo $serie->title ?></td>
                <td class="d-none d-sm-table-cell"><?php echo $serie->year ?></td>
                <td class="d-none d-sm-table-cell"><?php echo $serie->genres ?></td>
                <td>
                 	<span class="d-none"><?php echo round($serie->score,2) ?></span>
                 	<div class="rateRO" data-rate-value="<?php echo round($serie->score,2) ?>"></div>
                </td>
                <td class="d-none d-sm-table-cell"><?php
                     if ($serie->platform) {
                        echo "<a target='_blank' href='" . $serie->platformUrl . "'><img src='" . $serie->platformLogo ."'></a>";
                     }
                     ?>
                </td>
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
            },
            "order": [[ 4, "desc" ]],
            "paging": false,
            "info" : false
          });
        });
    </script>

<?php include '_footer.php' ?>