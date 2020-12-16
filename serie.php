<?php
require '_init.php';
require 'serie-code.php';
?>

<?php include '_header.php'; ?>

    <main role="main" class="fiche-serie">

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron" style="background-image: url('<?php echo $serie->banner ?>')">
            <div class="container">
                <h1 class="display-4"><?php echo $serie->title ?></h1>
                <div class="row">
                    <div class="col-sm-3 seriePoster">
                        <img src="<?php echo $serie->poster ?>"/>
                    </div>
                    <div class="col">
                        <div class="rateRO" data-rate-value="<?php echo $averageRate ?>"></div>
                        <p><?php echo $serie->plot ?></p>
                        <span class="serie-yearAndGenre"><?php echo $serie->year ?>
                            <?php
                            foreach (explode(", ", $serie->genres) as $genre) {
                                echo "<span class='badge badge-info ml-2'>$genre</span>";
                            }
                            ?>
              </span>


                    </div>
                    <div class="col-sm-2 d-none d-sm-block">
                        <?php
                        if ($serie->platform) {
                            echo "<a target='_blank' href='" . $serie->platformUrl . "'><img class='platform' src='" . $serie->platformLogo . "'></a>";
                        }
                        ?>
                        <p><?php echo ($serie->over) ? "Terminée" : "En cours" ?><br>
                            <?php echo ($serie->seasons) . " saison" . (($serie->seasons > 1) ? "s" : "") ?><br>
                            <?php echo ($serie->episodes) . " épisode" . (($serie->episodes > 1) ? "s" : "") ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <?php foreach ($serie->comments as $comment) { ?>

                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 mb-4">
                        <?php require "commentCard.php" ?>
                    </div>
                <?php } ?>
            </div><!--row-->
        </div> <!-- /container -->

    </main>

<?php include '_footer.php' ?>