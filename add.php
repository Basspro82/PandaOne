<?php require 'add-code.php' ?>

<?php include 'header.php' ?>

    <link href="./css/imdb-autocomplete.css" rel="stylesheet">

    <main role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <div class="container">
          <h1 class="display-3">Hello, world!</h1>
          <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
        </div>
      </div>

      <div class="container">
        <!-- Example row of columns -->

        <h2>Add Comment</h2>  

        <form action="add.php" method="post">
          <div class="container">
            <div class="searchArea row">
              <div class="col-8">
                <div class="form-group">
                  <input class="form-control" id="searchBox" type="text" placeholder="enter a serie">
                  <div id="result"></div>
                </div>
              </div>
              <div class="col-4">
                <span class="preview"></span>
              </div>
            </div>
            <input type="hidden" name="mode" value="1">
            <input type="hidden" name="imdbID" id="imdbID">
            <input type="hidden" name="title" id="title">
            <input type="hidden" name="year" id="year">
            <input type="hidden" name="poster" id="poster">
            <div class="form-group">
                <textarea class="form-control" type="text" name="comment" id="comment" placeholder="enter your comment"></textarea>
            </div>
            <input class="btn btn-primary btnSave" type="submit" name="btnSave" id="btnSave" value="Save" disabled="false">
          </div>
        </form>

      </div> <!-- /container -->

    </main>

    <script type="text/javascript" src="/js/add.js"></script>

<?php include 'footer.php' ?>