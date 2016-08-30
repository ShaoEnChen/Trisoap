<?
include_once("Helper/mysql_connect.php");
include_once("Helper/handle_string.php");
include_once("Helper/update_price.php");
include_once("Helper/redirect.js");
$ORDNO = input('ORDNO');
$EMAIL = input('EMAIL');
$ITEMNO = input('ITEMNO');
if($ORDNO != null && $EMAIL != null && $ITEMNO != null){
	$sql = "DELETE FROM ORDITEMMAS WHERE ORDNO='$ORDNO' AND EMAIL='$EMAIL' AND ITEMNO='$ITEMNO'";
	if(!mysql_query($sql)){
		?>
		<script>
		redirect("Order_Confirm.php");
		alert("移除失敗");
		</script>
		<?
	}
	else{
		?>
		<script>
		redirect("Order_Confirm.php");
		alert("移除成功");
		</script>
		<?
		if($ORDNO != '100000000')
			update_price($ORDNO);
	}
}
else{
	?>
	<script>
	redirect("../Homepage/index.php");
	alert("您無權限觀看此頁面");
	</script>
	<?
}