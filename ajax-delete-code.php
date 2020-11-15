<?php

include 'config.php';

require_once '../framework/log.php';
require_once '../framework/database.php';
require_once "manager/commentManager.php";

$showLog = false;

CommentManager::Delete($_POST['commentID']);

showLog('add-code','',$_POST);

$response_array['status'] = 'success';
header('Content-type: application/json');
echo json_encode($response_array);

?>