<div class="card p-3 mt-2 mb-2">
<!--    --><?php //if ($comment->new) { ?>
<!--        <div class="card-corner"><span>New</span></div>--><?php //} ?>
    <div class="row justify-content-center mb-5">
        <div class="col-auto">
            <a class="card-user" href="./user?userID=<?php echo $event->userID ?>">
                <div class="img-box"><img src="<?php echo $event->avatar ?>"/></div>
                <h3 class="card-pseudo"><?php echo $event->username ?></h3>
            </a>
        </div>
        <div class="col">
            <div class="row">
                <div class="col-auto">
                    <h4 class="card-date"><?php echo $event->date ?></h4>
                </div>
            </div>
            <blockquote>"<?php echo $event->html ?>"</blockquote>
        </div>
    </div><!--row-->

</div><!--card-->