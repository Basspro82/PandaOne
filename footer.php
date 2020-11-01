<?php include "footer-code.php" ?>

<footer>
	  <div class="footerUp">
	  	<div class="container">
	  		<div class="row align-items-center">
	  			<div class="col-3">
	  				<p>Développé avec &hearts; <br/>par Yann LAURAIN et Vincent JEZEQUEL</p>
	  			</div>
	  			<div class="col-9">
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

    <?php include "_scripts.php" ?>

</body></html>