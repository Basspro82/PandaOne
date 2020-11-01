<?php require "menu-code.php" ?>

<div class="outer-menu">
  <input class="checkbox-toggle" type="checkbox" />
  <div class="hamburger">
    <div></div>
  </div>
  <div class="menu">
    <div>
      <div>
        <?php include '_yourComment.php' ?>
      </div>
    </div>
  </div>
</div>
<a class="logo d-none d-sm-block" href="./home">
  <img src="./images/logo-light.png"/>
</a>
<a class="logo smallLogo d-block d-sm-none" href="./home">
	<img src="./images/small-logo-light.png"/>
</a>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top">  	
	<a class="navbar-brand" href="#"></a>

  	<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar"
	    aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
  	</button>
	
	<div class="collapse navbar-collapse" id="navbar">
	    <ul class="navbar-nav ml-auto align-items-center">
	    	<li class="nav-item"><a class="nav-link nav-selected" href="./home">Home <span class="sr-only">(current)</span></a></li>
	    	<li class="nav-item"><a class="nav-link" href="./series">Series</a></li>
	    	<li class="nav-item d-none"><a class="nav-link" href="./betaseries">betaseries</a></li>
	    	<li class="nav-item dropdown">
	      		<a class="nav-link dropdown-toggle" href="http://example.com/" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	      			<img class="gravatar" src="<?php echo $_SESSION["gravatar"]; ?>"/> <?php echo $_SESSION["pseudo"]; ?>
				</a>
		    	<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown01">
		      		<a class="dropdown-item" href="./my-comments">Mes commentaires</a>
		      		<a class="dropdown-item" href="./my-friends">Mes amis</a>
		      		<a class="dropdown-item" href="./account">Mon compte</a>
		      		<form class="form-inline" action="menu" method="POST">
		        		<input type="hidden" name="mode" value="logout">
	        			<button class="dropdown-item">Logout</button>
		      		</form>
		    	</div>
	  		</li>
		</ul>
	</div>
</nav>