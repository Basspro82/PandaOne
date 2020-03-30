<?php require 'index-code.php' ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">

    <title>HippoSeries</title>

    <link rel="canonical" href="#">
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/signin.css" rel="stylesheet">
    <link href="./css/main.css" rel="stylesheet">

  </head>

  <body class="text-center">
    <form action="index.php" method="post" class="form-signin">
      <input type="hidden" name="mode" value="1">
      <img class="mb-4" src="/images/logo.png" alt="" width="110" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Bienvenue sur PandaOne</h1>
      <label for="inputEmail" class="sr-only">Email</label>
      <input type="email" id="email" name="email" class="form-control" placeholder="Email" required autofocus="">
      <br/>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="password" name="password" class="form-control" required placeholder="Password">
      <br/>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <p><?php echo $message ?></p>
      <p class="mt-5 mb-3 text-muted">© 2020</p>
    </form>
  </body>
</html>