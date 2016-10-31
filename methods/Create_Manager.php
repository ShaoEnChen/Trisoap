<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
    <title>新增管理員</title>
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
	<div class="sign-block" style="width: 450px;">
    	<h1>新增管理員</h1>
			<form method="post" action="Create_Manager_finish.php">
				欲新增之管理員信箱：<input type="text" name="newEMAIL" /><br>
				請再次輸入您的密碼：<input type="password" name="CUSPW" /><br>
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
		<?php
	}
	?>
</body>
</html>