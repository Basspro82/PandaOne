<?php
include 'header.php';
require 'user-code.php';
?>

    <main role="main">

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <div class="container">
                <div class="row">

                    <div class="col-auto">
                        <h1 class="display-3"><?php echo $user->pseudo ?></h1>
                        <div class="col-2 userGravatar text-center">
                            <div class="img-box"><img src="<?php echo $user->gravatar ?>"/></div>
                        </div>
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

        <div class="container">

            <div role="tabpanel" id="commentsTab" class="tab-pane fade active show pt-5">
                <?php include 'userComments.php'; ?>
            </div>            

        </div> <!-- /container -->


    </main>

    <script type="text/javascript">

        $(document).ready(function () {
            $('#series').DataTable();
        });

    </script>

<?php include 'footer.php' ?>