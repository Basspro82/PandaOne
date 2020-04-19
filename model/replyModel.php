<?php

require_once '../../framework/string.php';
require_once 'userModel.php';

class Reply
{
	
	public function __construct(){
		// allocate your stuff
	}

    public static function fromDb($row,$firstIndex) {
    	$instance = new self();
    	$instance->replyID = $row[$firstIndex];
		$instance->userID = $row[$firstIndex + 1];
		$instance->commentID = $row[$firstIndex + 2];
		$instance->body = $row[$firstIndex + 3];
        $date = new DateTime($row[$firstIndex + 4]);
		$instance->createdAt = $date->format('d/m/yy H:i');
		return $instance;
    }
	
}

?>