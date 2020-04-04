<div class="row">
  <div class="col-12">

    <div class="row">
      <?php if (isset($comments)) { foreach ($comments as $comment) { ?>     
        <div class="col-12">
          <?php require "commentCard.php" ?>
        </div>
      <?php }} ?>
    </div><!--row-->

  </div>
</div>