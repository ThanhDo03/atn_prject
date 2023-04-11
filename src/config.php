<?php


$db_username = 'dott';
$db_password = 'dbPass@123';
$db_name = 'toyskid_project';
$db_host = 'db';

$mysqli = new mysqli($db_host, $db_username, $db_password, $db_name);
if($mysqli->connect_error){
    die('Error : (' .$mysqli->connect_error .') '.$mysqli->connect_error);
}

?>


