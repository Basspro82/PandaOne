<div class="card text-center mb-4 friendCard">
	<?php include "_user.php" ?>
    <div id="<?php echo $user->userID ?>" class="friendCompatibility circle">
    	<strong></strong>
    </div>
    <script type="text/javascript">
    	showCompatibility(<?php echo $_SESSION["userID"] ?>,<?php echo $user->userID ?>);
    </script>
    <a href="/user?userID=<?php echo $user->userID ?>" class="btn btn-primary">Voir la fiche</a>
</div>