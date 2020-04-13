<?php

include 'config.php';

require_once '../../framework/log.php';

require_once "manager/commentManager.php";
require_once "model/commentModel.php";

$showLog = false;

$page = 'betaseries';
$message = '';

$result = LoadAll('user',"betaID IS NOT NULL", 'email');
$events = [];
while($row = mysqli_fetch_row($result)){
    $userID = $row[0];
    $memberId = $row[6];
    $member = $row[1];
    $avatar = $row[3];
    $url = "https://api.betaseries.com/timeline/member?key=cabf2a885a7d&nbpp=100&id=" . $memberId;
    $str = file_get_contents($url);
    $data = json_decode($str);
    foreach ($data->events as $event) {
        $event->userID = $userID;
        $event->username = $member;
        $event->avatar = $avatar;
        $date = new DateTime($event->date);
        $event->dateStr = $date->format("d/m/Y H:i");
        $events[$event->date] = $event;
    }
}
krsort($events);
