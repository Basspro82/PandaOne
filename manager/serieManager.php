<?php

class SerieManager{

	public static function GetLast($nb)
	{

        $con = Connect();

        $sSQL = ' SELECT serie.*, avg(score) as score
             FROM serie
             LEFT JOIN comment on serie.imdbID=comment.imdbID
             GROUP BY serie.imdbID ';

        if ($nb != 0){
            $sSQL .= ' LIMIT 0,' . $nb;
        }

        $result = $con->query($sSQL);

		return $result;
		
	}

	public static function UpdateFromBetaseries($betaData) {
	    $imdbId = $betaData->imdb_id;
	    $seasons = $betaData->seasons;
	    $episodes = $betaData->episodes;
	    $banner = $betaData->images->show;
	    $desc = str_ireplace("'","''",$betaData->description);
	    $genres = get_object_vars($betaData->genres);

	    $genres = implode(", ",array_keys($genres));
	    $over = ($betaData->status == "Ended") ? 1 : 0;

	    $platform = "";
	    $platformUrl = "";
	    $platformLogo = "";
	    if ($betaData->platforms && $betaData->platforms->svod) {
            $platform = $betaData->platforms->svod->name;
            $platformUrl = $betaData->platforms->svod->link_url;
            $platformLogo = $betaData->platforms->svod->logo;
        }

	    $sql = "UPDATE serie SET seasons=$seasons, 
                        plot='$desc', 
                        episodes=$episodes, 
                        genres='$genres', 
                        banner='$banner', 
                        over=$over, 
                        platform='$platform', 
                        platformUrl='$platformUrl', 
                        platformLogo='$platformLogo' 
                        WHERE imdbID='$imdbId'";
	    ExecuteQuery($sql);
        echo $sql . "<br>";
    }

}