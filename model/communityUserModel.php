<?php

class CommunityUser
{
	
	public function __construct(){
		// allocate your stuff
	}

    public static function fromDb($object) {
	    
    	$instance = $object;
		return $instance;

    }
	
}

?>