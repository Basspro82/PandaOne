<?php require 'series-code.php' ?>

<?php include 'header.php' ?>

    <main role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <div class="container">
          <h1 class="display-3">Series</h1>
          <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
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
                  <th>Year</th>
                  <th>Genre</th>
                  <th>Rate</th>
              </tr>
          </thead>
          <tbody>
              <?php foreach ($series as $serie) { ?>    
              <tr>
                 <td><a href="./serie?imdbID=<?php echo $serie->imdbID ?>"><img src="<?php echo $serie->poster ?>" class="img-fluid" alt="<?php echo $serie->title ?>"></a></td> 
                 <td><?php echo $serie->title ?></td>
                 <td><?php echo $serie->plot ?></td>
                 <td><?php echo $serie->year ?></td>
                 <td><?php echo $serie->genre ?></td>
                 <td>[Rate]</td> 
              </tr>
              <?php } ?>
          </tbody>
        </table>    

      </div> <!-- /container -->

    </main>

    <script type="text/javascript">
        $(document).ready(function() {
          $('#series').DataTable();
        });
    </script>

<?php include 'footer.php' ?>