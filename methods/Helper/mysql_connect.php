<?php
$db_server = "localhost";
$db_name = "Trisoap";
$db_user = "root";
$db_passwd = "3b4b6b187def8c13";

if(!@mysqli_connect($db_server, $db_user, $db_passwd, $db_name))
        die("無法對資料庫連線");

// mysql_query("SET NAMES utf8");

// if(!@mysql_select_db($db_name))
// 	die("無法使用資料庫");
?>
