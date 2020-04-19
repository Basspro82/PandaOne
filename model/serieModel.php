<?php

require_once '../../framework/string.php';
require_once 'userModel.php';

class Serie
{
	
	public function __construct(){
		// allocate your stuff
	}

    public static function fromDb($row,$firstIndex) {
    	$instance = new self();
    	$instance->imdbID = $row[$firstIndex];
		$instance->title = $row[$firstIndex + 1];
		$instance->plot = $row[$firstIndex + 2];
		$instance->year = $row[$firstIndex + 3];
        $instance->genre = $row[$firstIndex + 4];
        $instance->poster = $row[$firstIndex + 5];
        $instance->createdAt = $row[$firstIndex + 6];
        $instance->url = "/serie?imdbID=" . $instance->imdbID;
		return $instance;
    }
	
}

?>