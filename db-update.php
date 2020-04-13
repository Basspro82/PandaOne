<?php

include 'config.php';

require_once '../../framework/log.php';
require_once "../../framework/database.php";

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


?>