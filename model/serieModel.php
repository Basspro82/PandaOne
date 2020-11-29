<?php

class Serie
{
	
	public function __construct(){
		// allocate your stuff
	}

    public static function fromDb($object) {

    	$instance = $object;
        $instance->url = "/serie?imdbID=" . $instance->imdbID;
        $instance->banner = "/images/series/banners/" . $instance->imdbID . '.jpg';
        $instance->poster = "/images/series/posters/" . $instance->imdbID . '.jpg';
		return $instance;
    }
	
}

?>