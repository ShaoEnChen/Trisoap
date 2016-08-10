<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
<?php
session_start();
include("Helper/mysql_connect.php");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];

if($EMAIL != null && $CUSIDT == 'A'){
        ?>
        請輸入發票編號<br>
        <form name="form" method="post" action="Update_ORDMAS_end.php">
        發票編號：<input type="text" name="INVOICENO" />
        <input type="submit" name="button" value="確定" />
        </form>
        <?
}
else{
	?>
    <script>
    alert("您無權限觀看此頁面!");
    </script>
    <meta http-equiv=REFRESH CONTENT=0.5;url=../Homepage/index.php>
    <?
}
?>