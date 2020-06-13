<?php

class CommunityUserManager
{

    public static function LoadAllUserID($communityID)
    {

        $con = Connect();

        $sql = ' SELECT U.userID FROM user U ' .
            ' INNER JOIN communityUser CU ON CU.userID = U.userID ' . 
            ' WHERE CU.communityID = ' . $communityID;

        $result = $con->query($sql);

        Disconnect($con);

        showLog('commentManager.php', 'LoadAll', $sql);

        return $result;

    }

}