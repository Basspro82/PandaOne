<div class="card p-3 mt-2 mb-2">
<!--    --><?php //if ($comment->new) { ?>
<!--        <div class="card-corner"><span>New</span></div>--><?php //} ?>
    <div class="row justify-content-center serie ">
        <div class="col-auto">
            <a class="card-user" href="./user?userID=<?php echo $event->userID ?>">
                <div class="img-box"><img src="<?php echo $event->avatar ?>"/></div>
                <h3 class="card-pseudo"><?php echo $event->username ?></h3>
            </a>
        </div>
        <div class="col">
            <div class="row">
                <div class="col-auto">
                    <h4 class="card-date"><?php echo $event->dateStr ?></h4>
                </div>
            </div>
            <?php echo $event->html ?>
        </div>
        <div class="col-auto">
            <a href="./serie?imdbID=<?php echo $event->imdbID ?>" class="poster"><img src="<?php echo $event->poster ?>" class="img-fluid"></a>
        </div>

    </div><!--row-->

</div><!--card-->