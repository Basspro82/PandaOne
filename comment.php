<?php include 'header.php' ?>
<?php require 'comment-code.php' ?>

    <main role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <div class="container">
          <div class="row">
            <div class="col-2 userGravatar text-center">
              <h1><?php echo $comment->user->pseudo ?></h1>
              <div class="img-box"><img src="<?php echo $comment->user->gravatar ?>"/></div>
            </div>
            <div class="col">
              <div class="rateRO" data-rate-value="<?php echo $comment->score ?>"></div>
              <p><?php echo $comment->comment ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="row no-gutters serie m-3">
                  <div class="col-auto">
                      <a href="./serie?imdbID=<?php echo $comment->imdbID ?>" class="poster"><img src="<?php echo $comment->serie->poster ?>" class="img-fluid" alt="<?php echo $comment->serie->title ?>"></a>
                  </div>
                  <div class="col">
                      <div class="card-block px-2">
                          <a href="./serie?imdbID=<?php echo $comment->imdbID ?>"><h4 class="card-title"><?php echo $comment->serie->title ?><!--&nbsp;<span class="badge badge-secondary">2 comments</span>--></h4></a>
                          <p class="card-text"><?php echo $comment->serie->plot ?></p>
                      </div>
                  </div>
              </div><!--serie-->
            </div>
          </div>
        </div><!-- container -->
      </div><!-- jumbotron -->

      <div class="container">

        <h2>Réaction(s)</h2>

          <div class="replies">
            <?php if (isset($replies)):
                if ($replies->num_rows > 0){
                  foreach ($replies as $reply): 
            ?>
                <!-- reply -->
                <div class="reply clearfix">
                  <div class="row">
                    <div class="col text-right align-self-center">
                      <span class="comment-date"><?php echo date("d/m/yy H:i", strtotime($reply["replyCreatedAt"])); ?></span>
                      <p><?php echo $reply['body']; ?></p>
                    </div>
                    <div class="col-auto align-self-center">
                        <a class="user" href="./user?userID=<?php echo $reply["userID"] ?>">
                          <div class="img-box"><img src="<?php echo $reply["gravatar"] ?>"/></div>
                          <h3 class="pseudo"><?php echo $reply["pseudo"] ?></h3>
                        </a>
                    </div>
                  </div>
                </div>
                <hr/>
              <?php endforeach;
            }else{ ?>
              <p><i>There are no reply for this comment</i></p>
            <?php }
            endif ?>

            <form action="comment.php?commentID=<?php echo $comment->commentID ?>" class="reply_form clearfix" method="POST">
              <input type="hidden" name="mode" id="mode" value="1">
              <input type="hidden" name="commentID" id="commentID" value="<?php echo $comment->commentID ?>">
              <textarea class="form-control" name="body" id="body" cols="30" rows="2"></textarea>
              <button class="btn btn-primary btn-xs float-right submit-reply mt-2">Submit reply</button>
            </form>

          </div><!--replies-->

      </div> <!-- /container -->

    </main>

<?php include 'footer.php' ?>