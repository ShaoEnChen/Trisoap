<!DOCTYPE html>
<html>

<head>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='css/sign.css' rel='stylesheet' type='text/css'>
    <link href='css/table.css' rel='stylesheet' type='text/css'>
    <meta charset="UTF-8">

    <title>建立訂單</title>
    <style>
    .sign-block {
        width: 400px;
        padding: 20px;
        border-top: 10px solid #AA0000;
        position: absolute;
        top: 50%;
        left: 50%;
        margin-right: -50%;
        transform: translate(-50%, -50%);
    }
    .sign-block h1 {
        font-family: 微軟正黑體;
    }
    .promise {
        background: #AA0000;
        border: 1px solid #880000;
    }
    .promise:hover {
        background: #880000;
    }
    </style>
</head>

<body>
	<?php
	session_start();
	include("Helper/mysql_connect.php");
	$EMAIL = $_SESSION['EMAIL'];
	$CUSIDT = $_SESSION['CUSIDT'];

	if($EMAIL != null){
    ?>
	<br>
    <div class="sign-block">
    	<h1>建立訂單</h1>
    	<form name="form" method="post" action="Create_ORDMAS1_finish.php">
	        <label for="need"><textarea name="ORDINST" rows="5" placeholder="特殊要求" id="need"></textarea></label>
	        <button type="submit" class="promise">確定</button>
	    </form>
    	<button type="button" class="cancel"></buttom><a href="../Homepage/product.php">取消</a>
		<?php
		}
		else{
			echo '請先登入或註冊!';
	    	echo '<meta http-equiv=REFRESH CONTENT=2;url=../Homepage/product.php>';
		}
		?>
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