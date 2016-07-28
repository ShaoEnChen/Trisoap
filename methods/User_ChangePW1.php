<!DOCTYPE html>
<html>

<head>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='css/sign.css' rel='stylesheet' type='text/css'>
    <meta charset="UTF-8">

    <title>三三社企-註冊</title>
</head>

<body>
<br>
	<?php
	session_start();
	include("Helper/mysql_connect.php");
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
		<button type="button" class="cancel"></buttom><a href="../Homepage/index.php">取消</a>
	</div>
	<?php
	}
	else{
		echo '您無權限觀看此頁面!';
    	echo '<meta http-equiv=REFRESH CONTENT=2;url=../Homepage/index.php>';
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