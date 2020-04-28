<div class="card text-center mb-4 userCard">
  <div class="img-box mt-2"><img class="card-img-top" src="<?php echo $user->gravatar ?>" alt="<?php echo $user->pseudo ?>"></div>
  <div class="card-body">
    <h5 class="card-title"><?php echo $user->pseudo ?></h5>
    <a href="/user?userID=<?php echo $user->userID ?>" class="btn btn-primary">Voir la fiche</a>
  </div>
</div>