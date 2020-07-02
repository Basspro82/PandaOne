<?php

class EpisodeMoanager
{

    public static function Find($betaID)
    {

        $con = Connect();

        $sql = "SELECT * 
		from episode
		INNER JOIN serie ON episode.serieID=imdbID
		WHERE episode.betaID=$betaID";


        showLog('episodeManager.php', 'Find', $sql);
        $result = $con->query($sql);

        if (!$result || !$result->num_rows) {
            // appel à Betaseries
            $url = "https://api.betaseries.com/episodes/display?key=cabf2a885a7d&id=" . $betaID;
            $str = file_get_contents($url);
            $data = json_decode($str);
            $serieID = $data->episode->show->id;

            // on vérifie si on a deja enregistré la série :
            $serie = SerieManager::FindByBetaID($serieID);
            if ($serie) {
                // on ajoute l'épisode
                $sql = "INSERT INTO episode (serieID,betaID) VALUES ('$serie->imdbID',$betaID)";
                showLog('episodeManager.php', 'Find', $sql);
                ExecuteQuery($sql);

            }
            $sql = "SELECT * 
                        from episode
                        INNER JOIN serie ON episode.serieID=imdbID
                        WHERE episode.betaID=$betaID";
            showLog('episodeManager.php', 'Find', $sql);

            $result = $con->query($sql);
        }

        Disconnect($con);

        if ($result) {
            return mysqli_fetch_object($result);
        }
        return false;
    }

    public static function Update($comment)
    {

        $con = Connect();

        showLog('CommentManager.php', 'Update', $comment);

        // Update comment

        $commentraw = mysqli_real_escape_string($con, $comment->comment);

        $query = "UPDATE comment SET comment = '$commentraw', score = " . $comment->score . " WHERE commentID = " . $comment->commentID;
        showLog('episodeManager.php', 'Update', $query);

        if (!ExecuteQuery($query)) {
            return;
        }

        Disconnect($con);
    }

    public static function LoadAll($filtre, $nb = 0, $p = 1)
    {

        $con = Connect();

        $sql = ' SELECT * FROM comment ' .
            ' INNER JOIN user ON comment.userID = user.userID ' .
            ' INNER JOIN serie ON comment.imdbID = serie.imdbID';

        if (!empty($filtre)) {
            $sql .= ' WHERE ' . $filtre;
        }

        $sql .= ' ORDER BY comment.createdAt DESC ';

        if ($nb > 0) $sql .= " LIMIT " . $nb * ($p - 1) . ", " . $nb;

        $result = $con->query($sql);

        Disconnect($con);

        showLog('commentManager.php', 'LoadAll', $sql);

        return $result;

    }

    public static function LoadOne($commentID)
    {

        $con = Connect();

        $sql = ' SELECT * FROM comment ' .
            ' INNER JOIN user ON comment.userID = user.userID ' .
            ' INNER JOIN serie ON comment.imdbID = serie.imdbID' .
            ' WHERE commentID = ' . $commentID;

        showLog('commentManager.php', 'LoadOne', $sql);

        $result = $con->query($sql);

        Disconnect($con);

        return $result;

    }

    public static function Delete($commentID)
    {

        $con = Connect();

        showLog('CommentManager.php', 'Delete', $commentID);

        $sql = " DELETE FROM comment WHERE commentID = " . $commentID;
        $result = $con->query($sql);

        Disconnect($con);

        showLog('commentManager.php', 'Delete', $sql);

        return $result;

    }

}