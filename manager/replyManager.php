<?php

class ReplyManager{

	// Receives a post id and returns the total number of comments on that post

	public static function getRepliesByCommentId($id)
	{

		$con = Connect();

		$query = "SELECT * FROM reply INNER JOIN user ON reply.userID = user.userID WHERE commentID = " . $id;

		$result = $con->query($query);
	
		Disconnect($con);

		showLog('replyManager.php','getRepliesByCommentId',$query);
		
		return $result;

	}

	public static function Add($reply)
	{
						
		$con = Connect();
		
		showLog('ReplyManager.php','Add',$reply);

		// Insert reply

		$body = mysqli_real_escape_string($con,$reply->body);

		$query = "INSERT INTO reply(userID,commentID,body,replyCreatedAt) VALUES('$reply->userID',$reply->commentID,'$body',NOW())";

		If (!ExecuteQuery($query)){
			return;
		}
			
		Disconnect($con);
	}

}