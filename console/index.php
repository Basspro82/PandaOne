<?php 

ini_set('display_errors',1);

include('../config.php');

require "../../framework/error.php";
require "../../framework/dom.php";

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
checkPage($dns . 'serie?imdbID=tt10293938','Fiche série');
checkPage($dns . 'comment.php?commentID=36','Fiche commentaire');
checkPage($dns . 'my-comments','Mes commentaires');
checkPage($dns . 'my-friends','Mes amis');
checkPage($dns . 'account','Mon compte');
checkPage($dns . 'subscribe.php','Inscription');
checkPage($dns . 'user?userID=2','Fiche utilisateur');
checkPage($dns . 'betaseries?supervision=1','Actualités sur betaseries');
checkPage($dns . 'delete-code','Page de suppression d un commentaire');
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