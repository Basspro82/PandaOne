<?php

require_once "../../framework/database.php";

class UserManager{

	public static function UpdateFromBetaseries($betaData) {
	    $id = $betaData->id;
	    $login = $betaData->login;

	    $sql = "UPDATE user SET betaID=$id WHERE betaLogin='$login'";
	    ExecuteQuery($sql);
        echo $sql . "<br>";
    }

}