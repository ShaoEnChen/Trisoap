<meta charset="utf-8">
<link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
<?php
session_start();
include_once("Helper/mysql_connect.php");
include_once("Helper/handle_string.php");
include_once("Helper/redirect.js");
include_once("Helper/analyticstracking.php");
$EMAIL = $_SESSION['EMAIL'];
$ORDNO = '100000000';
$ITEMNO = input('ITEMNO');
if($EMAIL != null && $ITEMNO != null){
	$sql = "DELETE FROM ORDITEMMAS WHERE ORDNO='$ORDNO' AND EMAIL='$EMAIL' AND ITEMNO='$ITEMNO'";
	if(mysql_query($sql)){
		unset($_SESSION['total']);
		?>
		<script>
		redirect("View_Purchase.php");
		alert("移除成功");
		</script>
		<?php
	}
	else{
		?>
		<script>
		redirect("View_Purchase.php");
		alert("移除失敗");
		</script>
		<?php
	}
}
else{
	?>
	<script>
	redirect("/");
	alert("您無權限觀看此頁面");
	</script>
	<?php
}