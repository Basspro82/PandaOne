<?php

function sendPandaLog($subject,$message){
	sendMail('noreply@pandaone.fr','ylaurain@gmail.com','[PANDAONE] : ' . $subject,$message);
}


?>