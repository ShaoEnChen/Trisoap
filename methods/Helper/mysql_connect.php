<?php
$db_server = "localhost";
$db_name = "Trisoap";
$db_user = "root";
// $db_passwd = "n0n02016";
$db_passwd = "allloststars";
// $connect = mysqli_connect($db_server, $db_user, $db_passwd, $db_name);

if(!@mysql_connect($db_server, $db_user, $db_passwd))
        die("無法對資料庫連線");

mysql_query("SET NAMES utf8");

if(!@mysql_select_db($db_name))
        die("無法使用資料庫");
?>
