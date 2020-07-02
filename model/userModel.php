<?php

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
	            $result2 = CommunityUserManager::LoadAllUser($row->communityID);
	            if ($result2 && $result2->num_rows != 0) {
	            	while($row = mysqli_fetch_object($result2)){
	            		$friends[] = CommunityUser::fromDB($row);
	            	}
	            }
	        }
	    }

	    $user->friends = $friends;

	}

	public static function sendNotifications($userID,$imdbID){

		// Load comment

		$result = CommentManager::LoadAll("user.userID = $userID AND serie.imdbID = '$imdbID'");
		
		if ($result){

			while($comment = mysqli_fetch_object($result)){

				$comment = Comment::fromDb($comment);

				showLog('userModel.php', 'sendNotifications', $comment);   

				// Load user

				$result = LoadOne('user','userID',$userID);
				if ($result){
					while($user = mysqli_fetch_object($result)){
						$user = User::fromDb($user);

						showLog('userModel.php', 'sendNotifications', $user);   

						foreach ($user->friends as $friend) {
							if ($friend->notif ==1)	{
								$subject = "[PANDAONE] : Nouveau commentaire";
								$message = "<b>" . $user->pseudo . "</b> a laissé un nouveau commentaire sur la série <b>" . $comment->serie->title . "</b>. Pour le consulter, <a href='" . $comment->url . "'>cliquez-ici</a>"; 
								sendMail('noreply@pandaone.fr',$friend->email,$subject,$message);
								showLog('userModel.php', 'sendNotifications', "envoi d'un mail à " . $friend->email);    
							}
						}

					}
				}

			}
		}

	}
	
}

?>