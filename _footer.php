<?php include "_footer-code.php" ?>

<?php if (isset($_SESSION['userID'])){ ?>
<footer>
	  <div class="footerUp">
	  	<div class="container">
	  		<div class="row align-items-center">
	  			<div class="col-sm-3">
	  				<p>Développé avec &hearts; par YL et VJ</p>
	  			</div>
	  			<div class="col-9 d-none d-sm-block">
	  				<div class="row align-items-center">
	  					<div class="col-4">
		                    <div class="row align-items-center">
		                        <div class="col-auto">
		                            <?php $user = $top; include "_user.php" ?> 
		                        </div>
		                        <div class="col">
		                            <p>est le plus bavard</p>
		                        </div>
		                    </div>
	                   	</div>
	                   	<div class="col-4">
		                    <div class="row align-items-center">
		                        <div class="col-auto">
		                            <?php $user = $best; include "_user.php" ?> 
		                        </div>
		                        <div class="col">
		                            <p>est le plus sympa</p>
		                        </div>
		                    </div>
	                	</div>
	                	<div class="col-4">
		                    <div class="row align-items-center">
		                        <div class="col-auto">
		                            <?php $user = $worst; include "_user.php" ?> 
		                        </div>
		                        <div class="col">
		                            <p>est le plus critique</p>
		                        </div>
		                    </div>
	                	</div>
	                </div>    
  				</div>
	  		</div>
	  	</div>
	  </div>
	  <div class="footerDown">
	  	<div class="container text-center">		
      		© PandaOne 2020
		</div>
		</div>
    </footer>
<?php } ?>

    <script src="./js/popper.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<script src="./js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="./js/rater.min.js"></script>
	<script src="./js/main.js"></script>

</body>
</html>