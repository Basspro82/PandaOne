<?php

require_once 'manager/communityUserManager.php';
require_once 'communityUserModel.php';

class User
{
	
	public $userID;
	public $friends;

	public function __construct(){
		// allocate your stuff
	}

    public static function fromDb($object) {
	    
    	$instance = $object;
        
    	// Add User Gravatar

        $instance->gravatar = "/images/avatars/" . $instance->userID . ".png";

        // Add User Friends

		User::addFriends($instance);

		return $instance;

    }

    public static function addFriends(&$user){

		$friends = [];
	    $result = LoadAll('communityUser','userID = ' . $user->userID);
	    if ($result && $result->num_rows != 0) {
	        while($row = mysqli_fetch_object($result)){
	            $result2 = CommunityUserManager::LoadAllUserID($row->communityID);
	            if ($result2 && $result2->num_rows != 0) {
	            	while($row = mysqli_fetch_object($result2)){
	            		$friends[] = CommunityUser::fromDB($row);
	            	}
	            }
	        }
	    }

	    $user->friends = $friends;

	}
	
}

?>