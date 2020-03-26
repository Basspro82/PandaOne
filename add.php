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
        <input id="searchBox" type="text" placeholder="enter a movie or actor name">
        <div id="result"></div>

        <form action="add.php" method="post">
          <div class="container">
            <input type="hidden" name="mode" value="1">
            <input type="text" name="imdbID" id="imdbID">
            <input type="text" name="title" id="title">
            <input type="text" name="year" id="year">
            <input type="text" name="genre" id="genre">
            <input type="text" name="poster" id="poster">
            <textarea type="text" name="comment" id="comment" placeholder="enter your comment"></textarea>
            <input type="submit" name="btnEnregistrer" value="Enregistrer">
          </div>
        </form>

      </div> <!-- /container -->

    </main>

    <script type="text/javascript" src="/js/imdb-autocomplete.js"></script>

<?php include 'footer.php' ?>