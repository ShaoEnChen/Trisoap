<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
    <title>三三社企-註冊</title>
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
	if($EMAIL != null){
	?>
	<div class="sign-block">
    	<h1>修改密碼</h1>
			<form name="form" method="post" action="User_ChangePW_finish.php">
				<label for="ori_password">原始密碼<br><input type="password" name="CUSPW" id="ori_password"/></label><br>
				<p>密碼限定使用英數字，長度上限為15字元</p>
				<label for="password">新密碼<br><input type="password" name="newCUSPW1" id="password"/></label><br>
				<label for="password2">再一次輸入新密碼<br><input type="password" name="newCUSPW2" id="password2"/></label><br>
				<button type="submit" class="promise">確定</button>
			</form>
		<a href="../Homepage/index.php"><button type="button" class="cancel">取消</button></a>
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