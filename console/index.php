<?php 

ini_set('display_errors',1);

include('../config.php');
include ('../../framework/frameworks.php');
include "../manager/managers.php";
include "../model/models.php";

$dns = '';
if (env == 'prod'){
	$dns = 'http://www.pandaone.fr/';
}
else{
	$dns = 'http://www.pandaone.local:8080/';
}

$showLog = false;

echo '<h1>' . $dns . '</h1>';
echo '<table>';
checkPage($dns,'login');
checkPage($dns . 'series?supervision=1','Liste des séries');
checkPage($dns . 'serie?imdbID=tt10293938&supervision=1','Fiche série');
checkPage($dns . 'my-comments?supervision=1','Mes commentaires');
checkPage($dns . 'my-friends?supervision=1','Mes amis');
checkPage($dns . 'account?supervision=1','Mon compte');
checkPage($dns . 'subscribe.php','Inscription');
checkPage($dns . 'user?userID=2&supervision=1','Fiche utilisateur');
checkPage($dns . 'betaseries?supervision=1','Actualités sur betaseries');
echo '</table>';

function checkPage($url,$page){
	echo '<tr><td><a target="_Blank" href="' . $url . '">' . $page . '</a></td>';
	if (pageHasError($url)){
		echo '<td><span style="color:red;">KO</span></td>';
	}else{
		echo '<td><span style="color:green;">OK</span></td>';
	}
	echo '</tr>';
}

?>