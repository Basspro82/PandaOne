<?php

require_once '../../framework/string.php';
require_once 'userModel.php';

class Serie
{
	
	public function __construct(){
		// allocate your stuff
	}

	/*public static function fromJson($json) {

		global $debug;

		$instance = new self();

		$snippet = $json->snippet;

		$instance->videoId = $json->id;
		
		$instance->publishedAt = $snippet->publishedAt;
        $instance->title = $snippet->title;
        $instance->channelId = $snippet->channelId;
		$instance->description = $snippet->description;
		
		$instance->thumbnails = Thumbnails::fromJson($snippet->thumbnails);
		
		$instance->channelTitle = $snippet->channelTitle;

		if (isset($snippet->tags)) {
			$instance->tags = $snippet->tags;
		}
		
		$instance->categoryId = $snippet->categoryId;
		
		if (isset($snippet->defaultLanguage)) {
			$instance->defaultLanguage = $snippet->defaultLanguage;
		}

		// TODO : $snippet->localized

		// TODO : contentDetails

		// TODO : status	

		$instance->statistics = Statistics::fromJson($json->statistics);

		if ($debug)showLog('video.php','fromJson',$instance);

		return $instance;

    }*/

    public static function fromDb($object,$firstIndex) {

    	$instance = $object;
//    	$instance->imdbID = $row[$firstIndex];
//		$instance->title = $row[$firstIndex + 1];
//		$instance->plot = $row[$firstIndex + 2];
//		$instance->year = $row[$firstIndex + 3];
//        $instance->genre = $row[$firstIndex + 4];
//        $instance->poster = $row[$firstIndex + 5];
//        $instance->createdAt = $row[$firstIndex + 6];
//        $instance->score = $row[$firstIndex + 7];
        $instance->url = "/serie?imdbID=" . $instance->imdbID;
		return $instance;
    }
	
}

?>