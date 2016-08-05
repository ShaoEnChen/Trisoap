<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>三三吾鄉手工皂 更新商品</title>
<?php
session_start();
include("Helper/mysql_connect.php");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];

if($EMAIL != null && $CUSIDT == 'A'){
	?>
    <form name="form" method="post" action="Edit_ITEMMAS_process.php">
    商品編號：<input type="text" name="ITEMNO" /> <br>
    <input type="submit" name="button" value="確定" />
    </form>
    <?
?>
<a href="Update_ITEMMAS.php">取消</a>
<?php
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