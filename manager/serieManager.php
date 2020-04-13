<?php

require_once "../../framework/database.php";

class SerieManager{

	public static function GetLast($nb)
	{

		return LoadAll('serie','','imdbID ASC',$nb);
		
	}

	public static function UpdateFromBetaseries($betaData) {
	    $imdbId = $betaData->imdb_id;
	    $seasons = $betaData->seasons;
	    $episodes = $betaData->episodes;
	    $over = ($betaData->status == "Ended") ? 1 : 0;

	    $platform = "";
	    $platformUrl = "";
	    $platformLogo = "";
	    if ($betaData->platforms && $betaData->platforms->svod) {
            $platform = $betaData->platforms->svod->name;
            $platformUrl = $betaData->platforms->svod->link_url;
            $platformLogo = $betaData->platforms->svod->logo;
        }

	    $sql = "UPDATE serie SET seasons=$seasons, episodes=$episodes, over=$over, platform='$platform', platformUrl='$platformUrl' platformLogo='$platformLogo' WHERE imdbID='$imdbId'";
	    ExecuteQuery($sql);
        echo $sql . "<br>";
    }

}