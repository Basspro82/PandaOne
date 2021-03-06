  <?php require "commentCard-code.php" ?>

  <div id="<?php echo $comment->commentID ?>" class="commentCard card mt-2 mb-2 pb-5 comment<?php echo $comment->commentID ?> shadow-sm">
    <?php if ($comment->new) { ?><div class="card-corner"><span>HOT</span></div><?php } ?>

    <?php if ($page <> 'serie'){ ?>
      <div class="row">
        <div class="col-auto">
          <a href="./serie?imdbID=<?php echo $comment->imdbID ?>" class="movieCard">
            <div class="movieCardHeader">
              <div class="movieCardTitle"><?php echo $comment->serie->title ?></div>
              <img src="<?php echo $comment->serie->poster ?>" class="img-fluid" alt="<?php echo $comment->serie->title ?>">
              <p class="movieCardText"><?php echo cutString($comment->serie->plot,200,'...') ?></p>
            </div>
          </a>
        </div>
      </div>
    <?php } ?>

    <div class="row justify-content-center m-3">
      
      <?php if (!isset($_GET["userID"])){ ?>
      <div class="col-auto">
        <?php 
        $user = $comment->user;
        include "_user.php";
        ?>
      </div>
      <?php } ?>
      
      <div class="col p-0">
        <div class="rateRO" data-rate-value="<?php echo $comment->score ?>"></div>
        <h4 class="card-date"><?php echo $comment->createdAt ?></h4>    
      </div>
    </div><!--row-->
    <div class="row m-3">
      <div class="col">
        <blockquote>
          "
          <?php if ($page == 'serie'){
            echo $comment->comment;
          }else{
            echo cutString($comment->comment,200,'...<a href="./serie?imdbID=' . $comment->imdbID . '#' . $comment->commentID . '">Lire la suite</a>');
          }
          ?>
          "
        </blockquote>
      </div>
    </div><!--row-->
    <?php if (($comment->user->userID == $_SESSION["userID"])&&($page=='my-comments')){ ?>
        <div class="row">
          <div class="col text-center">
            <div class="btn-group" role="group" aria-label="Action">
              <a class="btn btn-primary" href="./modifyComment?commentID=<?php echo $comment->commentID ?>">Modifier</a>
              <button type="button" class="btn btn-danger btnRemove" data-commentID="<?php echo $comment->commentID ?>">Supprimer</button>
            </div>
          </div>
        </div>
      <?php } ?>
    <div class="card-footer">
      <a class="d-none" href="./comment.php?commentID=<?php echo $comment->commentID ?>"><i class="fas fa-comment"></i>&nbsp;<?php echo $replies->num_rows ?></a>

      <div class="card-actions">
          <div class="outer-menu">
            <input class="checkbox-toggle btn3" type="checkbox" title="Ajouter un commentaire" data-imdbID="<?php echo $comment->serie->imdbID ?>" data-title="<?php echo $comment->serie->title ?>" />
            <div class="hamburger">
              <div></div>
            </div>
          </div> 
      </div>

       
    </div>
</div><!--card-->