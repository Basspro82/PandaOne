<?php

require_once '../../framework/string.php';
require_once 'userModel.php';

class Serie
{
	
	public function __construct(){
		// allocate your stuff
	}

    public static function fromDb($object,$firstIndex) {

    	$instance = $object;
        $instance->url = "/serie?imdbID=" . $instance->imdbID;
		return $instance;
    }
	
}

?>