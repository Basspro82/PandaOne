<?php

include 'config.php';

require_once '../../framework/log.php';
require_once "../../framework/database.php";
require_once "manager/userManager.php";

$series = LoadAll('user',"betaLogin is not null",'email');
while ($row = mysqli_fetch_object($series)) {
    $login = $row->betaLogin;
    $url = "https://api.betaseries.com/members/search?key=cabf2a885a7d&login=$login";
    $strData = file_get_contents($url);
    $data = json_decode($strData);
    if (count($data->users)>0) {
        UserManager::UpdateFromBetaseries($data->users[0]);
    }
}
