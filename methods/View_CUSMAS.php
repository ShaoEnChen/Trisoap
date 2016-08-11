<title>三三吾鄉手工皂 查看顧客</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
<?php
session_start();
include_once("Helper/mysql_connect.php");
include_once("Helper/redirect.js");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];

if($EMAIL != null && $CUSIDT == 'A'){
    $queryCustomer = "SELECT * FROM CUSMAS where CUSIDT='B'";
    $result = mysql_query($queryOrder);
    while($row = mysql_fetch_array($result)){
		echo "電子信箱:".$row['EMAIL']." 顧客姓名:".$row['CUSNM']." 顧客地址:".$row['CUSADD']." 顧客膚質:".$row['CUSTYPE']." 顧客生日:".$row['CUSBIRTHY']."/".$row['CUSBIRTHM']."/"$row['CUSBIRTHD']" 電話號碼:".$row['TEL']." 信用狀態:".$row['CREDITSTAT']." 狀態:".$row['ACTCODE']." 建立日期:".$row['CREATEDATE']." 最後修改日期:".$row['UPDATETEDATE']."<br>";
    }
?>
<a href="../Homepage/index.php">返回</a> <br>
<?php
}
else{
	?>
    <script>
    redirect("../Homepage/index.php");
    alert("您無權限觀看此頁面!");
    </script>
    <?
}