<?php require 'user-code.php' ?>

<?php include 'header.php' ?>

    <main role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <div class="container">
          <h1 class="display-3"><?php echo $user->pseudo ?></h1>
          <div class="row">
            <div class="col-2 userGravatar text-center">
              <div class="img-box"><img src="<?php echo $user->gravatar ?>"/></div>
            </div>
            <div class="col">
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vulputate velit nibh, vitae maximus lacus tincidunt sed. Etiam pretium augue sit amet semper luctus.</p>
            </div>
          </div>

          <div class="card-deck mt-5 text-center">
            <div class="card mb-4 shadow-sm">
              <div class="card-header">
                <h4 class="my-0 font-weight-normal">Comments</h4>
              </div>
              <div class="card-body">
                <h1 class="card-title pricing-card-title"><?php echo $nbComments ?><small class="text-muted"></small></h1>
              </div>
            </div>
            <div class="card mb-4 shadow-sm">
              <div class="card-header">
                <h4 class="my-0 font-weight-normal">Average rate</h4>
              </div>
              <div class="card-body">
                <h1 class="card-title pricing-card-title"><?php echo $averageRate ?><small class="text-muted"> / 5</small></h1>
              </div>
            </div>
            <div class="card mb-4 shadow-sm">
              <div class="card-header">
                <h4 class="my-0 font-weight-normal">Friends</h4>
              </div>
              <div class="card-body">
                <h1 class="card-title pricing-card-title"><?php echo $nbFriends ?><small class="text-muted"></small></h1>
              </div>
            </div>
          </div> 
        </div><!-- container -->
      </div><!-- jumbotron -->

      <div class="container">

        <ul class="nav nav-tabs">
          <!--<li class="nav-item"><a class="nav-link" data-toggle="tab" role="tab" href="#seriesTab">Series</a></li>-->
          <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#commentsTab">Comments</a></li>
          <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#friendsTab">Friends</a></li>
        </ul>

        <div class="tab-content">
          <!--<div role="tabpanel" id="seriesTab" class="tab-pane fade active show pt-5">
              <?php //include 'userSeries.php'; ?>
          </div>-->
          <div role="tabpanel" id="commentsTab" class="tab-pane fade active show pt-5">
              <?php include 'userComments.php'; ?>
          </div>
          <div role="tabpanel" id="friendsTab" class="tab-pane fade pt-5">
              [TODO]
          </div>
        </div>

      </div> <!-- /container -->

      

    </main>

    <script type="text/javascript">
        
        $(document).ready(function() {
          $('#series').DataTable();
        });

    </script>

<?php include 'footer.php' ?>