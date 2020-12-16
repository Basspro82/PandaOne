<?php 
include '_init.php';
require 'modifyComment-code.php'; 
?>

<?php 
$hiddenForm = false;
include '_header.php'; 
?>

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
  <div class="container">
    <h1 class="display-3">Modifier votre commentaire</h1>
  </div>
</div>

<form action="<?php echo $_SERVER["REQUEST_URI"] ?>" method="post">
  <div class="container">
    <div class="searchArea row">
      <div class="col">
        <div class="form-group">
          <input class="form-control" id="fTitle" type="text" value="<?php echo $title ?>" disabled>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <span class="preview"></span>
      </div>
    </div>

    <input type="hidden" name="mode" value="comment">
    <input type="hidden" name="urlReferrer" value="<?php echo $urlReferrer ?>">

    <input type="hidden" name="imdbID" id="imdbID" value="<?php echo $imdbID ?>">
    <input type="hidden" name="title" id="title">
    <input type="hidden" name="year" id="year">
    <input type="hidden" name="poster" id="poster">
    <input type="hidden" name="score" id="score" value="<?php echo $score ?>">
    <input type="hidden" name="commentID" value="<?php echo $commentID ?>">

    <div class="row">
      <div class="col">
        <div class="form-group">
          <div class="rate" data-rate-value="<?php echo $score ?>"></div>
        </div>
        <div class="form-group">
          <textarea class="form-control" type="text" name="comment" id="comment" placeholder="entrer votre commentaire"><?php echo $commentRaw ?></textarea>
        </div>
        <div class="btn-group" role="group" aria-label="Action">
          <input class="btn btn-primary btnSave" type="submit" name="btnSave" id="btnSave" value="Enregistrer" <?php echo $save ?>>
        </div>
      </div>
    </div>
  </div>
</form>

<script type="text/javascript" src="./js/add.js"></script>
<script type="text/javascript" src="./js/rater.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    var options = {
      max_value: 5,
      step_size: 0.5,
      selected_symbol_type: 'utf8_star',
      initial_value: 0,
      update_input_field_name: $("#score"),
    }
    $(".rate").rate(options);
  });
</script>

<?php include '_footer.php' ?>