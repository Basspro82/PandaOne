<?php

	include "../../framework/mail.php";

	ini_set( 'display_errors', 1 );
 
    error_reporting( E_ALL );
 
    $from = "noreply@pandaone.fr";
 
    $to = "ylaurain@gmail.com";
 
    $subject = "Verification PHP mail";
 
    $message = "PHP mail marche";
 
    sendMail($from,$to,$subject,$message);

    echo "L'email a été envoyé.";
	
?>