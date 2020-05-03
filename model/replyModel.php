<?php

require_once 'userModel.php';

class Reply
{
	
	public function __construct(){
		// allocate your stuff
	}

    public static function fromDb($row) {
    	
    	$instance = $object;
        $date = new DateTime($object->replyCreatedAt);
		$instance->createdAt = $date->format('d/m/yy H:i');
		return $instance;
    }
	
}

?>