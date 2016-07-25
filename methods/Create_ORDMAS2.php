<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>三三社企-建立訂單</title>

	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/animate.css">
	<!-- Custom Stylesheet -->
	<link rel="stylesheet" href="css/style.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>

<body>
	<?php
	include("Helper/mysql_connect.php");
	$EMAIL = $_SESSION['EMAIL'];
	$CUSIDT = $_SESSION['CUSIDT'];

	if($EMAIL != null){
    ?>
	<div class="container">
		<div class="top">
			<!--
			<h1 id="title" class="hidden"><span id="logo">Daily <span>UI</span></span></h1>
			-->
		</div>
		<div class="login-box animated fadeInUp">
			請先建立訂單<br>
			<div class="box-header">
				<h2>建立訂單</h2>
			</div>
			<form name="form" method="post" action="Create_ORDMAS2_finish.php">
	        <label for="username">
				<div class="styled-select">訂單種類*<br>
					<select name="ORDTYPE">
						<!--<option value=""></option>-->
						<option value="G">一般處理</option>
						<!--<option value="S">特別處理</option>-->
					</select>
				</div>
			</label>
			<!--<h5>特別處理需付額外費用</h5><br>-->

	        <label for="username">額外指令<br>
				<textarea name="ORDINST" cols="45" rows="5"></textarea>
	        </label><br>
	        
	        <button type="submit">確定</button>
	        </form>
			
			<button type="button"></buttom><a href="Order_Confirm.php">取消</a>
		</div>
	</div>
	<?php
			}
	}
	else{
		echo '請先登入或註冊!';
    	echo '<meta http-equiv=REFRESH CONTENT=1;url=../Homepages/product.php>';
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