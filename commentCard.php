  <?php require "commentCard-code.php" ?>

  <div class="card p-3 mt-2 mb-2 comment<?php echo $comment->commentID ?>">
    <div class="row justify-content-center mb-5">
      <div class="col-auto">
        <a class="card-user" href="/user?userID=<?php echo $comment->user->userID ?>">
          <div class="img-box"><img src="<?php echo $comment->user->gravatar ?>"/></div>
          <h3 class="card-pseudo"><?php echo $comment->user->pseudo ?></h3>
        </a>
      </div>
      <div class="col">
        <div class="row">
          <div class="col-auto">
            <div class="rateRO" data-rate-value="<?php echo $comment->score ?>"></div>    
          </div>
          <div class="col">
            <h4 class="card-date"><?php echo $comment->createdAt ?></h4>
          </div>
        </div>
        <blockquote>"<?php echo $comment->comment ?>"</blockquote>
      </div>
      
      <?php if ($comment->user->userID == $_SESSION["userID"]){ ?>
        <div class="col-auto text-right">
          <div class="btn-group" role="group" aria-label="Action">
            <a class="btn btn-primary" href="/comment?commentID=<?php echo $comment->commentID ?>">Modify</a>
            <button type="button" class="btn btn-danger btnRemove" data-commentID="<?php echo $comment->commentID ?>">Remove</button>
          </div>
        </div>
      <?php } ?>
      
    </div><!--row-->  

    <div class="row">
    <div class="col">
        
        <?php if ($page <> 'serie'){ ?>
        <div class="row no-gutters card-serie">
            <div class="col-auto">
                <a href="<?php echo $comment->serie->url ?>" class="card-poster"><img src="<?php echo $comment->serie->poster ?>" class="img-fluid" alt="<?php echo $comment->serie->title ?>"></a>
            </div>
            <div class="col">
                <div class="card-block px-2">
                    <a href="<?php echo $comment->serie->url ?>"><h4 class="card-title"><?php echo $comment->serie->title ?><!--&nbsp;<span class="badge badge-secondary">2 comments</span>--></h4></a>
                    <p class="card-text"><?php echo $comment->serie->plot ?></p>
                </div>
            </div>
        </div><!--card-serie-->
      <?php } ?>
    </div>
  </div>
</div><!--card-->