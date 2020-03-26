<?php

require_once "../../framework/database.php";

class SerieManager{

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

		return LoadAll('serie','','imdbID ASC');
		
	}

	public static function GetLastPagination($result, $nb ,$category ,$p ,$tag )
	{

	$con = Connect();	

	if (empty($p)){$p=1;};
	$NbEltByPage = 10;
	$nbresults = mysqli_num_rows($result);
	$html = '';

	$j = 1;
	
		$nbPages = $nbresults / $NbEltByPage;
		$prec = $p -1;
		$suiv = $p + 1;
		$fin = (int)$nbPages + 1;
	
		$html .= '<ul class="pagination">
		<li><a href="lastnews-page-' . $prec . '"><span aria-hidden="true">&laquo;</span><span class="sr-only">Précédent</span></a></li>';
		
		while($j <= $nbPages + 1) 
	     { 
			   if (($j < $p - 4)||($j > $p + 4)){
			   }else if ($p == $j){
					$class="selected";
					$html .= "<li><a href=\"lastnews-page-$j\" class=\"$class\">$j</a></li>";
			   }else{
					$class="";
					$html .= "<li><a href=\"lastnews-page-$j\" class=\"$class\">$j</a></li>";
			   }
	      
	           $j++; 
	     }
		 $html .= '<li><a href="lastnews-page-' . $suiv . '"><span aria-hidden="true">&raquo;</span><span class="sr-only">Suivant</span></a></li>
	     		</ul>';

	    Disconnect($con);

	    return $html; 		

	}

	

}