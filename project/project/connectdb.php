<?php
$server     = "localhost";
$user       = "root";
$pwd        = "";
$dbname     = "project";
$connection = mysqli_connect($server, $user, $pwd, $dbname);
$connection->set_charset("utf8");

$server_crm     = "localhost";
$user_crm       = "root";
$pwd_crm        = "";
$dbname_crm     = "project";
$connection_crm = mysqli_connect($server_crm, $user_crm, $pwd_crm, $dbname_crm);
$connection_crm->set_charset("utf8");
?>