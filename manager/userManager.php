<?php

require_once "../framework/database.php";

class UserManager{

	public static function UpdateFromBetaseries($betaData) {
	    $id = $betaData->id;
	    $login = $betaData->login;

	    $sql = "UPDATE user SET betaID=$id WHERE betaLogin='$login'";
	    ExecuteQuery($sql);
        echo $sql . "<br>";
    }

    public static function Add($user)
	{
						
		$con = Connect();
		
		showLog('userManager.php','Add',$user);

		// Insert user

		$query = "INSERT INTO user(pseudo,email,gravatar,password,betaLogin) VALUES('$user->pseudo','$user->email','$user->gravatar','$user->password','$user->betaLogin')";

		If (!ExecuteQuery($query)){
			return false;
		}
			
		Disconnect($con);

		return true;
	}

	public static function LoadAll($filtre='',$nb=0,$p=1)
	{

		$con = Connect();
		
		$sql = ' SELECT * FROM user ';
		
		if (!empty($filtre)) {
			$sql .= ' WHERE ' . $filtre;
		}	   

		//$sql .= ' ORDER BY comment.createdAt DESC ';	   

		if ($nb > 0) $sql .= " LIMIT " . $nb * ($p - 1) . ", " . $nb;
		
		$result = $con->query($sql);
		
		Disconnect($con);

		showLog('userManager.php','LoadAll',$sql);

		return $result;
		
	}

}