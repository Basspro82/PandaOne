<?php 

     session_start();

    /*****************************************/
    /* REQUIRE */

    require_once('config.php');
    require_once(FRAMEWORKPATH . 'frameworks.php');
    require_once('model/models.php');
    require_once('manager/managers.php');
    require_once('functions.php');
    require_once ('_yourComment-code.php');

    /*****************************************/

    ini_set('display_errors',1);

    // Check session

    if ((!isset($_SESSION['userID']))&&(env != 'dev')){

        header('Location:./'); 
    
    }else if (env == 'dev'){
        
        $_SESSION["userID"] = 1;
        $_SESSION["pseudo"] = 'basspro';
        $_SESSION["gravatar"] = '';
        $_SESSION["friends"] = '2,3';
    
    }

    // Set Url Referrer

    $urlReferrer = '';
    if ((!isset($_POST['mode']))&&(isset($_SERVER['HTTP_REFERER']))){
        $urlReferrer = $_SERVER['HTTP_REFERER'];
    }

    //Logout

    if (isset($_POST['mode'])){
        if ($_POST["mode"]=='logout'){
            session_start();
            session_unset();
            session_destroy();
            header('Location:index');
        }
    }    

?>