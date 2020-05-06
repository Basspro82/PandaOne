<?php

include 'header.php';
require 'home-code.php';

?>

    <main role="main" class="homePage">

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 mb-3 mt-3">
                        <h1 class="display-3">Bienvenue</h1>
                        <p>Partagez avec vos amis les commentaires sur vos séries préférées !</p>
                        <p><a class="btn btn-primary btn-lg" href="./yourComment" role="button">Ajouter un commentaire
                                +</a>
                        </p>
                    </div>
                    <div class="col-lg-7 mb-3 mt-3">
                        <div class="row">
                        	<div class="col">
	                            <div class="card mb-4 shadow-sm">
	                                <div class="card-header text-center">
	                                    <h5 class="my-0 font-weight-normal">Le plus bavard</h4>
	                                </div>
	                                <div class="card-body">
	                                    <h4 class="card-title pricing-card-title text-center">
	                                        <a class="user" href="./user?userID=<?php echo $top->userID ?>">
	                                            <div class="img-box"><img src="<?php echo $top->gravatar ?>"/></div>
	                                            <span class="pseudo">
	                                            <?php echo $top->pseudo ?></span></a></h4>
	                                </div>
	                            </div><!-- card -->
                    		</div>
                    		<div class="col">
	                            <div class="card mb-4 shadow-sm">
	                                <div class="card-header text-center">
	                                    <h5 class="my-0 font-weight-normal">Le plus sympa</h4>
	                                </div>
	                                <div class="card-body">
	                                    <h4 class="card-title pricing-card-title text-center">
	                                        <a class="user" href="./user?userID=<?php echo $best->userID ?>">
	                                            <div class="img-box"><img src="<?php echo $best->gravatar ?>"/></div>
	                                            <span class="pseudo">
	                                            <?php echo $best->pseudo ?></span></a></h4>
	                                </div>
	                            </div><!--card-->
	                        </div>
	                        <div class="col">
	                            <div class="card mb-4 shadow-sm">
	                                <div class="card-header text-center">
	                                    <h5 class="my-0 font-weight-normal">Le plus critique</h4>
	                                </div>
	                                <div class="card-body">
	                                    <h4 class="card-title pricing-card-title text-center">
	                                        <a class="user" href="./user?userID=<?php echo $worst->userID ?>">
	                                            <div class="img-box"><img src="<?php echo $worst->gravatar ?>"/></div>
	                                            <span class="pseudo">
	                                            <?php echo $worst->pseudo ?></span></a></h4>
	                                </div>
	                            </div><!--card-->
                    		</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <!-- Example row of columns -->
            <div class="row">
                <div class="col-12">
                    <h2>Quoi de neuf ?</h2>

                    <div class="row">
                        <?php foreach ($comments as $comment) { ?>
                            <div class="col-12">
                                <?php require "commentCard.php" ?>
                            </div>
                        <?php } ?>
                    </div><!--row-->
                    <?php echo $pagination ?>
                </div>
            </div>

        </div> <!-- /container -->

    </main>

<?php include 'footer.php' ?>