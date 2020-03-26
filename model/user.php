<?php

require_once '../../framework/string.php';

class User
{
	
	public function __construct(){
		// allocate your stuff
	}

    public static function fromDb($row, $firstIndex) {
    	$instance = new self();
    	$instance->userID = $row[$firstIndex];
		$instance->pseudo = $row[$firstIndex + 1];
		$instance->mail = $row[$firstIndex + 2];
		$instance->gravatar = $row[$firstIndex + 3];
		return $instance;
    }
	
}

?>