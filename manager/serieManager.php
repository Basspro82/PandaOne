<?php

class SerieManager
{

    public static function GetLast($nb)
    {

        $con = Connect();

        $sSQL = ' SELECT serie.*, avg(score) as score
             FROM serie
             INNER JOIN comment on serie.imdbID=comment.imdbID
             GROUP BY serie.imdbID ';

        if ($nb != 0) {
            $sSQL .= ' LIMIT 0,' . $nb;
        }

        $result = $con->query($sSQL);

        Disconnect($con);
        return $result;

    }

    public static function FindByImdbID($imdbID) {
        $con = Connect();

        $result = self::LoadAll("imdbID=$imdbID");

        Disconnect($con);

        return $result;

    }

    public static function FindByBetaID($betaID)
    {
        $con = Connect();

        $result = self::LoadAll("betaID=$betaID");
        if (!$result || !$result->num_rows) {
            // appel à Betaseries
            $url = "https://api.betaseries.com/shows/display?key=cabf2a885a7d&id=" . $betaID;
            $str = file_get_contents($url);
            $data = json_decode($str);
            // on vérifie si on a déjà la serie :
            $imdbId = $data->show->imdb_id;
            $serie = self::FindByImdbID($imdbId);
            if (!$serie) {
                // nouvelle, on l'ajoute
                self::InsertFromBetaseries($data->show);
            } else {
                self::UpdateFromBetaseries($data->show);
            }

        }

        $result = self::LoadAll("betaID=$betaID");
        if ($result && $result->num_rows) {
            return mysqli_fetch_object($result);
        }
        return false;
    }

    public static function LoadAll($filtre = '', $nb = 0, $p = 1)
    {

        $con = Connect();

        $sql = ' SELECT * FROM serie ';

        if (!empty($filtre)) {
            $sql .= ' WHERE ' . $filtre;
        }

        if ($nb > 0) $sql .= " LIMIT " . $nb * ($p - 1) . ", " . $nb;

        $result = $con->query($sql);

        Disconnect($con);

        showLog('serieManager.php', 'LoadAll', $sql);

        return $result;

    }

    public static function UpdateFromBetaseries($betaData)
    {
        $imdbId = $betaData->imdb_id;
        $betaID = $betaData->id;
        $seasons = $betaData->seasons;
        $episodes = $betaData->episodes;
        $banner = $betaData->images->show;
        $desc = str_ireplace("'", "''", $betaData->description);
        $genres = get_object_vars($betaData->genres);

        $genres = implode(", ", array_keys($genres));
        $over = ($betaData->status == "Ended") ? 1 : 0;

        $platform = "";
        $platformUrl = "";
        $platformLogo = "";
        if ($betaData->platforms && $betaData->platforms->svod) {
            $platform = $betaData->platforms->svod->name;
            $platformUrl = $betaData->platforms->svod->link_url;
            $platformLogo = $betaData->platforms->svod->logo;
        }

        $sql = "UPDATE serie SET betaID=$betaID, seasons=$seasons, 
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

    public static function InsertFromBetaseries($betaData)
    {
        $betaID = $betaData->id;
        $imdbId = $betaData->imdb_id;
        $seasons = $betaData->seasons;
        $year = $betaData->creation;
        $title = $betaData->title;
        $episodes = $betaData->episodes;
        $banner = $betaData->images->show;
        $poster = $betaData->images->poster;
        $desc = str_ireplace("'", "''", $betaData->description);
        $genres = get_object_vars($betaData->genres);

        $genres = implode(", ", array_keys($genres));
        $over = ($betaData->status == "Ended") ? 1 : 0;

        $platform = "";
        $platformUrl = "";
        $platformLogo = "";
        if ($betaData->platforms && $betaData->platforms->svod) {
            $platform = $betaData->platforms->svod->name;
            $platformUrl = $betaData->platforms->svod->link_url;
            $platformLogo = $betaData->platforms->svod->logo;
        }

        $sql = "INSERT INTO serie (imdbID,title,plot,year,genres,poster,banner,betaID,over,platform,platformUrl,platformLogo,seasons,episodes,createdAt) 
                        value ('$imdbId', 
                        '$title',
                        '$desc', 
                        $year, 
                        '$genres', 
                        '$poster', 
                        '$banner', 
                        $betaID,
                        $over, 
                        '$platform', 
                        '$platformUrl', 
                        '$platformLogo',
                        $seasons,
                        $episodes,NOW())";
        ExecuteQuery($sql);
    }

}