<!DOCTYPE html>
<html lang="fr">
    
    <head>
    
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="<?php echo $descriptionPage ?>">
        <meta name="author" content="">

        <title><?php echo $titlePage ?></title>

        <link rel="apple-touch-icon" sizes="152x152" href="/images/icons/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/images/icons/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/images/icons/favicon-16x16.png">
        <link rel="manifest" href="/images/icons/site.webmanifest">
        <link rel="mask-icon" href="/images/icons/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">

        <link href="./vendor/bootstrap-4.4.1-dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="./css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="./vendor/fontawesome-free-5.13.0-web/css/all.css" rel="stylesheet">
        <link href="./css/main.css" rel="stylesheet">

        <script src="./js/jquery-3.4.1.js"></script>
        <script src="./vendor/bootstrap-4.4.1-dist/js/bootstrap.js"></script>
        <script src="./vendor/bootstrap-4.4.1-dist/js/bootstrap.bundle.js"></script>

        <?php if (isset($_SESSION['userID'])){ ?>
        <meta property="og:site_name" content="PandaOne" />
        <meta property="og:locale" content="fr_FR" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="<?php echo $ogTitle ?>" />
        <meta property="og:url" content="<?php echo $ogUrl ?>" />
        <meta property="og:image" content="<?php echo $ogImage ?>" />
        <meta property="og:description" content="<?php echo $ogDescription ?>" />
        <?php } ?>

    </head>

    <body class="<?php echo $bodyClass ?>">

        <?php if (isset($_SESSION['userID'])){ ?>


        <?php if (!isset($hiddenForm)){ ?>    

        <div class="outer-menu" id="js-menu" name="js-menu">

        <?php if (isset($_GET['imdbID'])){ ?>
            <input class="checkbox-toggle btn2" type="checkbox" />
        <?php }else{ ?>
            <input class="checkbox-toggle btn1" type="checkbox" />
        <?php } ?>
      
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

        <?php } ?>

        <a class="logo d-none d-sm-block" href="./home">
          <img src="./images/logo-light.png"/>
        </a>
        <a class="logo smallLogo d-block d-sm-none" href="./home">
            <img src="./images/small-logo-light.png"/>
        </a>

        <nav class="navbar navbar-expand-lg navbar-dark fixed-top">

            <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbar"
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
                            <form class="form-inline" method="POST">
                                <input type="hidden" name="mode" value="logout">
                                <button class="dropdown-item">Logout</button>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <?php } ?>