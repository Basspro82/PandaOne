<?php

include 'header.php';
require 'home-code.php';

?>

<main role="main" class="homePage">

    <div class="container-fluid">
        <div class="row mt-5 intro">
            <div class="col-auto my-auto">
                <h1>PandaOne Blog</h1>
            </div>
            <div class="col-md-3 my-auto">
                <h2>Les dernières actus séries de votre communauté entreprise.</h2>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-9">

                <div class="row row-eq-height">
                    <?php foreach ($comments as $comment) { ?>
                        <div class="col-lg-4 col-sm-6 mb-4">
                            <?php require "commentCard.php" ?>
                        </div>
                    <?php } ?>
                </div><!--row-->
                <?php echo $pagination ?>
            </div>
            <div class="col-lg-3">
                <div class="card highlight p-5 mt-2 mb-2">
                    <div class="row align-items-center mb-4">
                        <div class="col-auto">
                            <?php $user = $top; include "_user.php" ?> 
                        </div>
                        <div class="col">
                            <p>est le plus bavard</p>
                        </div>
                    </div>
                    <div class="row align-items-center mb-4">
                        <div class="col-auto">
                            <?php $user = $best; include "_user.php" ?> 
                        </div>
                        <div class="col">
                            <p>est le plus sympa</p>
                        </div>
                    </div>
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
        </div><!-- row -->

    </div> <!-- /container -->

</main>

<?php include 'footer.php' ?>