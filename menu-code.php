<?php

$showLog = false;

if (isset($_POST['mode'])){
	if ($_POST["mode"]=='logout'){
		session_destroy();
		header('Location:index');
	}
}

?>