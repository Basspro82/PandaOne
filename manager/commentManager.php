<?php

require_once "../../framework/database.php";

class CommentManager{

	public static function Add($comment)
	{
						
		$con = Connect();
		
		showLog('CommentManager.php','Add',$comment);

		//************************************
		// Save serie
		//************************************

		If (!AlreadyExist('serie','imdbID',$comment->imdbID)){

			$serie = $comment->serie;	
			$title = mysqli_real_escape_string($con,$serie->title);
			$poster = mysqli_real_escape_string($con,$serie->poster);

			// Insert in serie table 

			$query = "INSERT INTO serie VALUES('$comment->imdbID','$title','','$serie->year','','$poster',CURDATE())";

			If (!ExecuteQuery($query)){
				return;
			}

		}

		// Insert in comment table

		$commentraw = mysqli_real_escape_string($con,$comment->comment);

		$query = "INSERT INTO comment(imdbID,userID,comment,createdAt) VALUES('$comment->imdbID',1,'$commentraw',CURDATE())";

		If (!ExecuteQuery($query)){
			return;
		}
			
		Disconnect($con);
	}

	public static function Update($comment)
	{
						
		$con = Connect();
		
		showLog('CommentManager.php','Update',$comment);

		// Update comment

		$commentraw = mysqli_real_escape_string($con,$comment->comment);

		$query = "UPDATE comment SET comment = '$commentraw' WHERE commentID = " . $comment->commentID;

		If (!ExecuteQuery($query)){
			return;
		}
			
		Disconnect($con);
	}

	public static function LoadAll($filtre,$nb=0)
	{

		$con = Connect();
		
		$sql = ' SELECT * FROM comment ' . 
			   ' INNER JOIN user ON comment.userID = user.userID ' .
			   ' INNER JOIN serie ON comment.imdbID = serie.imdbID';
		
		if (!empty($filtre)) {
			$sql .= ' WHERE ' . $filtre;
		}	   

		$sql .= ' ORDER BY comment.createdAt DESC ';	   

		if ($nb != 0) $sql .= ' LIMIT 0,' . $nb;
		
		$result = $con->query($sql);
		
		Disconnect($con);

		showLog('commentManager.php','GetLast',$sql);

		return $result;
		
	}

}