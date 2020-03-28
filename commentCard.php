  <div class="card mt-2 mb-2">
    <div class="row justify-content-center">
      <div class="col-auto">
        <div class="img-box"><img src="<?php echo $comment->user->gravatar ?>"/></div>
      </div>
      <div class="col">
          <h3 class="card-pseudo"><?php echo $comment->user->pseudo ?></h3>
          <h4 class="card-date"><?php echo $comment->createdAt ?></h4>
      </div>
      <div class="col-right mr-3">
        <div class="btn-group" role="group" aria-label="Action">
          <a class="btn btn-primary" href="/comment?commentID=<?php echo $comment->commentID ?>">Modify</a>
          <button type="button" class="btn btn-danger">Remove</button>
        </div>
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