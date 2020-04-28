<?php

include 'config.php';

require_once '../framework/log.php';
require_once "../framework/database.php";

$showLog = false;

$result = LoadAll('user',"", 'email',1);
$row = mysqli_fetch_object($result);
if (!property_exists($row,"betaLogin")) {
    $sql = "ALTER TABLE user ADD COLUMN betaLogin NVARCHAR(100)";
    ExecuteQuery($sql);
    echo "Ajout de la colonne betaLogin<br>";
}
if (!property_exists($row,"betaLogin")) {
    $sql = "ALTER TABLE user ADD COLUMN betaID NVARCHAR(100)";
    ExecuteQuery($sql);
    echo "Ajout de la colonne betaID<br>";
}


$result = LoadAll('serie',"", 'imdbID',1);
$row = mysqli_fetch_object($result);
if (!property_exists($row,"seasons")) {
    $sql = "ALTER TABLE serie ADD COLUMN seasons INTEGER ";
    ExecuteQuery($sql);
    echo "Ajout de la colonne seasons<br>";
}
if (!property_exists($row,"episodes")) {
    $sql = "ALTER TABLE serie ADD COLUMN episodes INTEGER ";
    ExecuteQuery($sql);
    echo "Ajout de la colonne episodes<br>";
}
if (!property_exists($row,"over")) {
    $sql = "ALTER TABLE serie ADD COLUMN over BIT ";
    ExecuteQuery($sql);
    echo "Ajout de la colonne over<br>";
}
if (!property_exists($row,"platform")) {
    $sql = "ALTER TABLE serie ADD COLUMN platform NVARCHAR(100)";
    ExecuteQuery($sql);
    echo "Ajout de la colonne platform<br>";
}
if (!property_exists($row,"platformUrl")) {
    $sql = "ALTER TABLE serie ADD COLUMN platformUrl NVARCHAR(250)";
    ExecuteQuery($sql);
    echo "Ajout de la colonne platformUrl<br>";
}

if (!property_exists($row,"platformLogo")) {
    $sql = "ALTER TABLE serie ADD COLUMN platformLogo NVARCHAR(250)";
    ExecuteQuery($sql);
    echo "Ajout de la colonne platformLogo<br>";
}
if (!property_exists($row,"genres")) {
    $sql = "ALTER TABLE serie ADD COLUMN genres NVARCHAR(250)";
    ExecuteQuery($sql);
    echo "Ajout de la colonne genres<br>";
}
if (!property_exists($row,"banner")) {
    $sql = "ALTER TABLE serie ADD COLUMN banner NVARCHAR(250)";
    ExecuteQuery($sql);
    echo "Ajout de la colonne banner<br>";
}
if (!property_exists($row,"betaID")) {
    $sql = "ALTER TABLE serie ADD COLUMN betaID integer";
    ExecuteQuery($sql);
    echo "Ajout de la colonne betaID sur la série<br>";
}

// Ajout de la table reply
if (!tableExist('reply')){
    $sql = "CREATE TABLE IF NOT EXISTS `reply` (
      `replyID` int(11) NOT NULL AUTO_INCREMENT,
      `userID` int(11) NOT NULL,
      `commentID` int(11) NOT NULL,
      `body` text NULL,
      `createdAt` datetime NOT NULL, 
      PRIMARY KEY (`replyID`),
      KEY `FK_reply_user` (`userID`),
      KEY `FK_reply_comment` (`commentID`)
    ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";
    ExecuteQuery($sql);
    echo "Ajout de la table reply<br>";
}
$sql = "ALTER TABLE serie MODIFY COLUMN plot NVARCHAR(1000)";
ExecuteQuery($sql);
echo "Rallongement de la colonne plot<br>";


if (!tableExist('episode')){
    $sql = "CREATE TABLE IF NOT EXISTS `episode` (
      `episodeID` int(11) NOT NULL AUTO_INCREMENT,
      `serieID` int(11) NOT NULL,
      `betaID` int(11) NOT NULL,
      PRIMARY KEY (`episodeID`)
    ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";
    ExecuteQuery($sql);
    echo "Ajout de la table episode<br>";
}

?>