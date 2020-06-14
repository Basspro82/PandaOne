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

        showLog('communityUserManager.php', 'LoadAll', $sql);

        return $result;

    }

    public static function Add($communityID,$user)
    {

        $con = Connect();

        showLog('communityUserManager.php', 'Add', $user);

        $query = "INSERT INTO communityuser VALUES($communityID,$user->userID)";

        showLog('communityUserManager.php', 'Add', $query);    

        if (!ExecuteQuery($query)) return false;

        Disconnect($con);

        return true;
    }

}