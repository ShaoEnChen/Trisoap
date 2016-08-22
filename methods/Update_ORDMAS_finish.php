<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
<?php
session_start();
include_once("Helper/mysql_connect.php");
include_once("Helper/redirect.js");
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
    redirect("../Homepage/index.php");
    alert("您無權限觀看此頁面!");
    </script>
    <?
}
?>