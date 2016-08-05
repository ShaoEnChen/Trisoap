<!DOCTYPE html>
<html>

<head>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='css/sign.css' rel='stylesheet' type='text/css'>
    <meta charset="UTF-8">

    <title>三三社企-修改資料</title>
</head>

<body>
<br>
	<?php
	session_start();
	include("Helper/mysql_connect.php");
	include("Helper/sql_operation.php");
	$EMAIL = $_SESSION['EMAIL'];
	$CUSIDT = $_SESSION['CUSIDT'];

	if($EMAIL != null){
		$row = select('CUSMAS', 'EMAIL', $EMAIL);
		$CUSNM = $row['CUSNM'];
		$CUSADD = $row['CUSADD'];
		$TEL = $row['TEL'];
		$TAXID = $row['TAXID'];
		$CUSTYPE = $row['CUSTYPE'];
		$SPEINS = $row['SPEINS'];
		function checkCUSTYPE($ori, $new){
			if($ori == $new) echo 'selected="selected"';
		}
	?>
	<div class="sign-block">
    	<h1>修改資料</h1>
			<form name="form" method="post" action="Update_CUSMAS_finish.php">
				<label for="username">電子信箱：<?echo $EMAIL;?></label><br>
				<label for="username">您的姓名：<input type="text" name="CUSNM" value="<?echo $CUSNM;?>"/></label><br>
				<label for="username">通訊地址：<input type="text" name="CUSADD" value="<?echo $CUSADD;?>"/></label><br>
				<label for="username">聯絡電話：<input type="text" name="TEL" value="<?echo $TEL;?>"/></label><br>
				<label for="username">統一編號：<input type="text" name="TAXID" value="<?echo $TAXID;?>"/></label><br>
				<div class="styled-select">您的膚質：
					<select name="CUSTYPE">
					  	<option value="A" <?checkCUSTYPE($CUSTYPE, 'A');?>>乾性</option>
					  	<option value="B" <?checkCUSTYPE($CUSTYPE, 'B');?>>中性</option>
					  	<option value="C" <?checkCUSTYPE($CUSTYPE, 'C');?>>油性</option>
					  	<option value="D" <?checkCUSTYPE($CUSTYPE, 'D');?>>混和性</option>
					</select>
				</div>
				</label><br>
				<label for="username">特殊要求：<textarea name="SPEINS" cols="45" rows="5"><?echo $SPEINS;?></textarea></label><br>
				<button type="submit" class="promise">確定</button>
			</form>
		<button type="button" class="cancel"></buttom><a href="../Homepage/index.php">取消</a>
	</div>
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