<!DOCTYPE html>
<html>

<head>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='css/sign.css' rel='stylesheet' type='text/css'>
    <meta charset="UTF-8">

    <title>三三社企-忘記密碼</title>
    <style>
    .sign-block {
        width: 350px;
        padding: 20px;
        position: absolute;
        top: 50%;
        left: 50%;
        margin-right: -50%;
        transform: translate(-50%, -50%);
    }
    .sign-block input {
        width: 100%;
    }
    </style>
</head>

<body>
<br>
<div class="sign-block">
    <h1>忘記密碼</h1>
	<form name="form" method="post" action="User_ForgetPW_finish.php">
		<label for="forget_email">請輸入您的電子信箱<br><input type="text" name="EMAIL" id="forget_email"/></label><br>
		<button type="submit" class="promise">確定</button>
	</form>
	<button type="button" class="cancel"></buttom><a href="User_login1.php">取消</a>
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