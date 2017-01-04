<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
    <title>修改資料</title>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='css/sign.css' rel='stylesheet' type='text/css'>
</head>

<body>
<br>
	<?php 
	session_start();
	include_once("Helper/mysql_connect.php");
	include_once("Helper/sql_operation.php");
	include_once("Helper/redirect.js");
	include_once("Helper/analyticstracking.php");
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
		<form method="post" action="Update_CUSMAS_finish.php">
			電子信箱：<?php echo $EMAIL;?></label><br>
			您的姓名：<input type="text" name="CUSNM" value="<?php echo $CUSNM;?>" /><br>
			通訊地址：<input type="text" name="CUSADD" value="<?php echo $CUSADD;?>" /><br>
			聯絡電話：<input type="text" name="TEL" value="<?php echo $TEL;?>" /><br>
			統一編號：<input type="text" name="TAXID" value="<?php echo $TAXID;?>" /><br>
			<div class="styled-select">您的膚質：
				<select name="CUSTYPE">
				  	<option value="A" <?php checkCUSTYPE($CUSTYPE, 'A');?>>乾性</option>
				  	<option value="B" <?php checkCUSTYPE($CUSTYPE, 'B');?>>中性</option>
				  	<option value="C" <?php checkCUSTYPE($CUSTYPE, 'C');?>>油性</option>
				  	<option value="D" <?php checkCUSTYPE($CUSTYPE, 'D');?>>混和性</option>
				</select>
			</div>
			<br>
			特殊要求：<textarea name="SPEINS" cols="45" rows="5"><?php echo $SPEINS;?></textarea><br>
			<button type="submit" class="promise">確定</button>
		</form>
		<a href="/"><button type="button" class="cancel">取消</button></a>
	</div>
	<?php 
	}
	else{
		?>
		<script>
		redirect("/");
		alert("您無權限觀看此頁面!");
		</script>
		<?php 
	}
	?>
</body>
</html>