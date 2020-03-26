<?php

require_once "../../framework/database.php";

class CommentManager{

	/*public static function Add($video)
	{
						
		$con = Connect();
		
		$title = mysqli_real_escape_string($con,$video->title);
		$description = mysqli_real_escape_string($con,$video->description);
		$channelTitle = mysqli_real_escape_string($con,$video->channelTitle); 

		$time = strtotime($video->publishedAt);
		$date = date('Y-m-d H:i:s',$time);

		$videoId = $video->videoId;

		$thumbnails = $video->thumbnails;
		$def = $thumbnails->def;
		$medium = $thumbnails->medium;
		$high = $thumbnails->high;
		$standard = $thumbnails->standard;
		$maxres = $thumbnails->maxres;
		$statistics = $video->statistics;
		$tags = '';
    
    $viewCount = ($statistics->viewCount == '') ? '0' : $statistics->viewCount;
    $likeCount = ($statistics->likeCount == '') ? '0' : $statistics->likeCount;
    $dislikeCount = ($statistics->dislikeCount == '') ? '0' : $statistics->dislikeCount;
    $favoriteCount = ($statistics->favoriteCount == '') ? '0' : $statistics->favoriteCount;
    $commentCount = ($statistics->commentCount == '') ? '0' : $statistics->commentCount;

		foreach ($video->tags as $tag) {
			if ($tags != '') $tags .= ', ';
			$tags .= mysqli_real_escape_string($con,$tag);
		}  

		// Insertion dans la table vidéo

		$query = "INSERT INTO video(videoId,publishedAt,channelId, title,description, channelTitle, tags, categoryId, defaultLanguage, viewCount, likeCount, dislikeCount, favoriteCount, commentCount, createdAt,enable)";
		$query .= " VALUES('$video->videoId','$date','$video->channelId','$title','$description','$channelTitle','$tags',$video->categoryId,'$video->defaultLanguage',$viewCount,$likeCount,$dislikeCount, $favoriteCount, $commentCount,CURDATE(),1)";

		If (!ExecuteQuery($query)){
			return;
		}

		// Insertion dans la table thumbnail
		// Types 
		// 1 : def
		// 2 : medium
		// 3 : high
		// 4 : standard
		// 5 : maxres

		if (isset($def)){
			$query = "INSERT INTO thumbnail(videoId,channelId,type,url,width,height)";
			$query .= " VALUES('$videoId','',1,'$def->url',$def->width,$def->height);";
			ExecuteQuery($query);
		}

		if (isset($medium)){
			$query = "INSERT INTO thumbnail(videoId,channelId,type,url,width,height)";
			$query .= " VALUES('$videoId','',2,'$medium->url',$medium->width,$medium->height);";
			ExecuteQuery($query);
		}

		if (isset($high)){
			$query = "INSERT INTO thumbnail(videoId,channelId,type,url,width,height)";
			$query .= " VALUES('$videoId','',3,'$high->url',$high->width,$high->height);";
			ExecuteQuery($query);
		}

		if (isset($standard)){
			$query = "INSERT INTO thumbnail(videoId,channelId,type,url,width,height)";
			$query .= " VALUES('$videoId','',4,'$standard->url',$standard->width,$standard->height);";
			ExecuteQuery($query);
		}

		if (isset($maxres)){
			$query = "INSERT INTO thumbnail(videoId,channelId,type,url,width,height)";
			$query .= " VALUES('$videoId','',5,'$maxres->url',$maxres->width,$maxres->height);";
			ExecuteQuery($query);
		}
			
		Disconnect($con);
	}*/

	public static function GetLast($nb)
	{

		$con = Connect();
		
		$sql = ' SELECT * FROM comment ' . 
			   ' INNER JOIN user ON comment.userID = user.userID ' .
			   ' INNER JOIN serie ON comment.imdbID = serie.imdbID';
		
		if ($nb != 0) $sql .= ' LIMIT 0,' . $nb;
		
		$result = $con->query($sql);
		
		Disconnect($con);

		showLog('commentManager.php','GetLast',$sql);

		return $result;
		
	}

}