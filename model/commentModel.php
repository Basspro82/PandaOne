<?php

require_once 'userModel.php';
require_once 'serieModel.php';

class Comment
{
	
	public function __construct(){
		// allocate your stuff
	}

    public static function fromDb($object) {

    	$instance = $object;

        $date = new DateTime($object->commentCreatedAt);
		$instance->createdAt = $date->format('d/m/yy H:i');

        $now = new DateTime;
		$now->setTime(0,0,0);
		$date->setTime(0,0,0);
		$instance->new = $now->diff($date)->days ===0;

		$instance->user = User::fromDB($object,6);
		
		$instance->serie = Serie::fromDB($object,13);
		
		return $instance;
    }

    public static function GetTop($order){

    	$result = CommentManager::GetTop($order);
    	while($row = mysqli_fetch_object($result)){
			$top = $row;

			// Add User Gravatar

			$top->gravatar = "/images/avatars/" . $top->userID . ".png";

		}

		return $top;

    }
	
}

?>