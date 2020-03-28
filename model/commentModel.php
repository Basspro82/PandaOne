<?php

require_once '../../framework/string.php';

require_once 'userModel.php';
require_once 'serieModel.php';

class Comment
{
	
	public function __construct(){
		// allocate your stuff
	}

    public static function fromDb($row) {
    	$instance = new self();
    	$instance->commentID = $row[0];
		$instance->imdbID = $row[1];
		$instance->userID = $row[2];
		$instance->comment = $row[3];
		$date = new DateTime($row[4]);
		$instance->createdAt = $date->format('d/m/y H:i');
		$instance->user = User::fromDB($row,5);
		$instance->serie = Serie::fromDB($row,10);
		return $instance;
    }
	
}

?>