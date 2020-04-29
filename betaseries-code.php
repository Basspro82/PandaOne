<?php

require_once '../framework/log.php';

require_once "manager/episodeManager.php";
require_once "model/commentModel.php";

$showLog = false;
$showRequest = false;

$page = 'betaseries';
$message = '';

$result = LoadAll('user',"betaID IS NOT NULL", 'email');
$events = [];
while($row = mysqli_fetch_row($result)){
    $userID = $row[0];
    $memberId = $row[6];
    $member = $row[1];
    $avatar = $row[3];
    $url = "https://api.betaseries.com/timeline/member?key=cabf2a885a7d&nbpp=30&id=" . $memberId;
    $str = file_get_contents($url);
    $data = json_decode($str);
    foreach ($data->events as $event) {

        // on récupère la série ou l'épisode :
        if ($event->type=="markas" || $event->type=="add_serie") {
            // episode :
            $episode = EpisodeMoanager::Find($event->ref_id);
            $event->imdbID = $episode->imdbID;
            $event->poster = $episode->poster;
        } else {
            // on parle d'une série
            $serie = SerieManager::FindByBetaID($event->ref_id);
            $event->imdbID = $serie->imdbID;
            $event->poster = $serie->poster;
        }
        $event->html = strip_tags($event->html);
        $event->userID = $userID;
        $event->username = $member;
        $event->avatar = $avatar;
        $date = new DateTime($event->date);
        $event->dateStr = $date->format("d/m/Y H:i");
        $events[$event->date] = $event;
    }
}
krsort($events);
