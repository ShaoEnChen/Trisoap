<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
    <title>三三社企-忘記密碼</title>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='css/sign.css' rel='stylesheet' type='text/css'>
    <link href='css/single.css' rel='stylesheet' type='text/css'>
</head>

<body>
<br>
<div class="sign-block" style="width: 350px;">
    <h1>忘記密碼</h1>
	<form name="form" method="post" action="User_ForgetPW_finish.php">
		<label for="forget_email">請輸入您的電子信箱<br><input type="text" name="EMAIL" id="forget_email"/></label><br>
		<button type="submit" class="promise">確定</button>
	</form>
	<a href="User_login1.php"><button type="button" class="cancel">取消</button></a>
</div>
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