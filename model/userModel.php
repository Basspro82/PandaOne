<?php

require_once '../../framework/string.php';

class User
{
	
	public function __construct(){
		// allocate your stuff
	}

    public static function fromDb($object, $firstIndex) {
	    return $object;
//    	$instance = new self();
//    	$instance->userID = $row[$firstIndex];
//		$instance->pseudo = $row[$firstIndex + 1];
//		$instance->mail = $row[$firstIndex + 2];
//		$instance->gravatar = $row[$firstIndex + 3];
//		$instance->password = $row[$firstIndex + 4];
//		$instance->betaLogin = $row[$firstIndex + 5];
//		$instance->betaID = $row[$firstIndex + 6];
//		return $instance;
    }
	
}

?>