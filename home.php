<?php require 'home-code.php' ?>

<?php include 'header.php' ?>

    <main role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <div class="container">
          <h1 class="display-3">Hello, world!</h1>
          <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
          <p><a class="btn btn-primary btn-lg" href="/add" role="button">Add comment +</a></p>
        </div>
      </div>

      <div class="container">
        <!-- Example row of columns -->
        <div class="row">
          <div class="col-9">
        <h2>Last comments</h2>  

        <div class="row">
        <?php foreach ($comments as $comment) { ?>     
            <div class="col-12">
              <div class="card mt-2 mb-2">
              <div class="row justify-content-center">
                  <div class="col-auto">
                    <div class="img-box"><img src="<?php echo $comment->user->gravatar ?>"/></div>
                  </div>
                  <div class="col">
                      <h3 class="card-pseudo"><?php echo $comment->user->pseudo ?></h3>
                      <h4 class="card-date"><?php echo $comment->createdAt ?></h4>
                  </div>
                </div>
                <div class="row">
                <div class="col">
                    
                    <blockquote>"<?php echo $comment->comment ?>"</blockquote>
                    <div class="row no-gutters card-serie">
                        <div class="col-auto">
                            <a href="<?php echo $comment->serie->url ?>" class="card-poster"><img src="<?php echo $comment->serie->poster ?>" class="img-fluid" alt="<?php echo $comment->serie->title ?>"></a>
                        </div>
                        <div class="col">
                            <div class="card-block px-2">
                                <a href="<?php echo $comment->serie->url ?>"><h4 class="card-title"><?php echo $comment->serie->title ?>&nbsp;<span class="badge badge-secondary">2 comments</span></h4></a>
                                <p class="card-text"><?php echo $comment->serie->plot ?></p>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div><!--card-->
            </div>
            <?php } ?>
          </div><!--row-->
          <a class="btn btn-primary btn-lg" href="https://getbootstrap.com/docs/4.0/examples/jumbotron/#" role="button">See All</a>
          </div>
          <div class="col">
            <h2>[A voir]</h2>
          </div> 
        </row>

      </div> <!-- /container -->

    </main>

<?php include 'footer.php' ?>