<?php

require_once '../../framework/string.php';

require_once 'userModel.php';
require_once 'serieModel.php';

class Comment
{
	
	public function __construct(){
		// allocate your stuff
	}

    public static function fromDb($object) {

    	$instance = $object;
//    	$instance->commentID = $row[0];
//		$instance->imdbID = $row[1];
//		$instance->userID = $row[2];
//		$instance->comment = $row[3];
//		$instance->score = $row[4];
        $date = new DateTime($object->createdAt);
		$instance->createdAt = $date->format('d/m/yy H:i');

        $now = new DateTime;
		$now->setTime(0,0,0);
		$date->setTime(0,0,0);
		$instance->new = $now->diff($date)->days ===0;

		$instance->user = User::fromDB($object,6);
		
		$instance->serie = Serie::fromDB($object,13);
		
		return $instance;
    }
	
}

?>