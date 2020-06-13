<?php

class CommentManager
{

    public static function Add($comment)
    {

        $con = Connect();

        showLog('CommentManager.php', 'Add', $comment);

        //************************************
        // Save serie
        //************************************

        if (!AlreadyExist('serie', 'imdbID', $comment->imdbID)) {

            $serie = $comment->serie;
            $title = mysqli_real_escape_string($con, $serie->title);
            $poster = mysqli_real_escape_string($con, $serie->poster);
            $plot = mysqli_real_escape_string($con, $serie->plot);

            // Insert in serie table

            $query = "INSERT INTO serie VALUES('$comment->imdbID','$title','$plot','$serie->year','','$poster',NOW(),NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL)";

            if (!ExecuteQuery($query)) {
                return;
            }

        }

        // Insert in comment table

        $commentraw = mysqli_real_escape_string($con, $comment->comment);

        $query = "INSERT INTO comment(imdbID,userID,comment,score,commentCreatedAt) VALUES('$comment->imdbID',$comment->userID,'$commentraw','$comment->score',NOW())";

        if (!ExecuteQuery($query)) {
            return;
        }

        Disconnect($con);
    }

    public static function Update($comment)
    {

        $con = Connect();

        showLog('CommentManager.php', 'Update', $comment);

        // Update comment

        $commentraw = mysqli_real_escape_string($con, $comment->comment);

        $query = "UPDATE comment SET comment = '$commentraw', score = " . $comment->score . " WHERE commentID = " . $comment->commentID;

        if (!ExecuteQuery($query)) {
            return;
        }

        Disconnect($con);
    }

    public static function LoadAll($filtre, $nb = 0, $p = 1)
    {

        $con = Connect();

        $sql = " SELECT * FROM comment
                 INNER JOIN user ON comment.userID = user.userID
                 INNER JOIN serie ON comment.imdbID = serie.imdbID";

        $sql .= ' WHERE user.userID IN (' . $_SESSION["friends"] . ') ';    

        if (!empty($filtre)) $sql .= ' AND ' . $filtre;

        $sql .= ' ORDER BY comment.commentCreatedAt DESC ';

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


    const MOST_COMMENTS = "MOST_COMMENTS";
    const BEST_RATED = "BEST_RATED";
    const WORST_RATED = "WORST_RATED";

    public static function GetTop($order)
    {
        $con = Connect();

        $orderQuery = '';
        $sort = "";
        switch ($order) {
            case self::MOST_COMMENTS:
                $orderQuery = "COUNT(commentID)";
                $sort = "DESC";
                break;
            case self::BEST_RATED:
                $orderQuery = "AVG(commentID)";
                $sort = "DESC";
                break;
            case self::WORST_RATED:
                $orderQuery = "AVG(commentID)";
                $sort = "ASC";
                break;

        }
        $sql = " SELECT pseudo,user.userID,gravatar,$orderQuery as val FROM comment 
                INNER JOIN user ON comment.userID = user.userID
                WHERE user.userID IN (" . $_SESSION["friends"] . ")
                GROUP BY pseudo,user.userID,gravatar
                ORDER BY $orderQuery $sort
                LIMIT 0,1";

        $result = $con->query($sql);

        Disconnect($con);

        showLog('commentManager.php', 'GetTop', $sql);

        return $result;
    }

}