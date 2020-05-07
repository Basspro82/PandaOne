<?php

class User
{
	
	public function __construct(){
		// allocate your stuff
	}

    public static function fromDb($object) {
	    
    	$instance = $object;
        $instance->gravatar = "/images/avatars/" . $instance->userID . ".png";
		return $instance;

    }
	
}

?>