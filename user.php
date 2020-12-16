<?php
require '_init.php';
require 'user-code.php';
?>

<?php include '_header.php'; ?>

    <main role="main" class="userPage">

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-auto">
                        <?php include "_user.php" ?>
                    </div>

                    <div class="col card-deck mt-4 text-center">
                        <div class="card mb-4 shadow-sm">
                            <div class="card-header">
                                <h4 class="my-0 font-weight-normal">Commentaires</h4>
                            </div>
                            <div class="card-body">
                                <h1 class="card-title pricing-card-title"><?php echo $nbComments ?><small
                                            class="text-muted"></small></h1>
                            </div>
                        </div>
                        <div class="card mb-4 shadow-sm">
                            <div class="card-header">
                                <h4 class="my-0 font-weight-normal">Note moyenne</h4>
                            </div>
                            <div class="card-body">
                                <h1 class="card-title pricing-card-title"><?php echo $averageRate ?><small
                                            class="text-muted"> / 5</small></h1>
                            </div>
                        </div>
                        <div class="card mb-4 shadow-sm">
                            <div class="card-header">
                                <h4 class="my-0 font-weight-normal">Profil betaseries</h4>
                            </div>
                            <div class="card-body">
                                <h1 class="card-title pricing-card-title">
                                    <?php if ($user->betaLogin) {
                                        echo "<a class='user' href='https://www.betaseries.com/membre/$user->betaLogin' target='_blank'><span class='pseudo'>$user->betaLogin</span></a>";
                                    } ?></h1>
                            </div>
                        </div>
                    </div>
                </div>


            </div><!-- container -->
        </div><!-- jumbotron -->

        <div class="container-fluid">

            <div role="tabpanel" id="commentsTab" class="tab-pane fade active show pt-5">
                <div class="row">
                  <div class="col-12">

                    <div class="row">
                      <?php if (isset($comments)) { foreach ($comments as $comment) { ?>     
                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 mb-4">
                          <?php require "commentCard.php" ?>
                        </div>
                      <?php }} ?>
                    </div><!--row-->

                  </div>
                </div>
            </div>            

        </div> <!-- /container -->


    </main>

    <script type="text/javascript">

        $(document).ready(function () {
            $('#series').DataTable();
        });

    </script>

<?php include '_footer.php' ?>