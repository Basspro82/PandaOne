<?php

class UserManager
{

    public static function UpdateFromBetaseries($user)
    {

        $url = "https://api.betaseries.com/members/search?key=cabf2a885a7d&login=" . $user->betaLogin;
        $strData = file_get_contents($url);
        $data = json_decode($strData);
        if (count($data->users)>0) {
            $sql = "UPDATE user SET betaID='" . $data->users[0]->id . "' WHERE email='" . $user->email . "'";
        } else {
            $sql = "UPDATE user SET betaID=NULL WHERE email='" . $user->email . "'";
        }
        ExecuteQuery($sql);
    }

    public static function Add($user)
    {

        $con = Connect();

        showLog('userManager.php', 'Add', $user);

        // Insert user
        $query = "INSERT INTO user(pseudo,email,gravatar,password,betaLogin,notif) VALUES('$user->pseudo','$user->email','$user->gravatar','$user->password','$user->betaLogin',1)";

        if (!ExecuteQuery($query)) {
            return false;
        }

        if ($user->betaLogin) {
            self::UpdateFromBetaseries($user);
        }

        Disconnect($con);

        return true;
    }

    public static function Update($user)
    {

        $sql = "UPDATE user SET pseudo='$user->pseudo', 
                        email='$user->email',
                        betaLogin='$user->betaLogin',
                        notif=$user->notif
                        WHERE userID='$user->userID'";

        ExecuteQuery($sql);

        if ($user->betaLogin) {
            self::UpdateFromBetaseries($user);
        }
        return true;
    }

    public static function GetCurrent()
    {
        if (!isset($_SESSION["userID"])) {
            return null;
        }
        $result = self::LoadAll("userID=" . $_SESSION["userID"]);
        if ($result) {
            return mysqli_fetch_object($result);
        }
    }

    public static function LoadAll($filtre = '', $nb = 0, $p = 1)
    {

        $con = Connect();

        $sql = ' SELECT * FROM user ';

        $sql .= ' WHERE user.userID IN (' . $_SESSION["friends"] . ') ';    

        if (!empty($filtre)) $sql .= ' AND ' . $filtre;

        //$sql .= ' ORDER BY comment.createdAt DESC ';

        if ($nb > 0) $sql .= " LIMIT " . $nb * ($p - 1) . ", " . $nb;

        $result = $con->query($sql);

        Disconnect($con);

        showLog('userManager.php', 'LoadAll', $sql);

        return $result;

    }

}