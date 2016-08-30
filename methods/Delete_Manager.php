<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
    <title>三三社企-刪除管理員</title>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>   
    <link href='css/sign.css' rel='stylesheet' type='text/css'>
</head>

<body>
<br>
	<?php
	session_start();
	include_once("Helper/mysql_connect.php");
	include_once("Helper/redirect.js");
	$EMAIL = $_SESSION['EMAIL'];
	$CUSIDT = $_SESSION['CUSIDT'];
	if($EMAIL != null && $CUSIDT == 'A'){
	?>
	<div class="sign-block">
    	<h1>刪除管理員</h1>
			<form name="form" method="post" action="Delete_Manager_finish.php">
				<label for="email">欲刪除之管理員信箱<br><input type="text" name="newEMAIL" id="email"/></label><br>
				<label for="password">請再次輸入您的密碼<br><input type="password" name="CUSPW" id="password"/></label><br>
				<button type="submit" class="promise">確定</button>
			</form>
		<a href="Update_Manager.php"><button type="button" class="cancel">取消</button></a>
	</div>
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
	?>
</body>

<script>
	$(document).ready(function () {
    	$('#logo').addClass('animated fadeInDown');
    	$("input:text:visible:first").focus();
	});
	$('#username').focus(function() {
		$('label[for="username"]').addClass('selected');
	});
	$('#username').blur(function() {
		$('label[for="username"]').removeClass('selected');
	});
	$('#password').focus(function() {
		$('label[for="password"]').addClass('selected');
	});
	$('#password').blur(function() {
		$('label[for="password"]').removeClass('selected');
	});
</script>

</html>