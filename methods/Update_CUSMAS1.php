<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>三三社企-修改資料</title>

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
	include("Helper/sql_operation.php");
	$EMAIL = $_SESSION['EMAIL'];
	$CUSIDT = $_SESSION['CUSIDT'];

	if($EMAIL != null){
		$row = select('CUSMAS', 'EMAIL', $EMAIL);
    ?>
	<div class="container">
		<div class="top">
			<!--
			<h1 id="title" class="hidden"><span id="logo">Daily <span>UI</span></span></h1>
			-->
		</div>
		<div class="login-box animated fadeInUp">
			<div class="box-header">
				<h2>修改資料</h2>
			</div>
			<form name="form" method="post" action="Update_CUSMAS_finish.php">
			<label for="username">
			<?php
				echo "電子信箱：$EMAIL <p>";
			?>
			<label for="username">姓名
	        <?php
	        $CUSNM = $row['CUSNM'];
	        echo "<input type=\"text\" name=\"CUSNM\" value=\"$CUSNM\" />";
	        ?>
	        地址
	        <?php
	        $CUSADD = $row['CUSADD'];
	        echo "<input type=\"text\" name=\"CUSADD\" value=\"$CUSADD\" /> <br>";
	        ?>
	    	</label><br>
	    	<label for="username">電話
	        <?php
	        $TEL = $row['TEL'];
	        echo "<input type=\"text\" name=\"TEL\" value=\"$TEL\" />";
	        ?>
	        統編
	        <?php
	        $TAXID = $row['TAXID'];
	        echo "<input type=\"text\" name=\"TAXID\" value=\"$TAXID\" />";
	        ?>
	    	</label><br>
	        <label for="username">
					<div class="styled-select">您的膚質*<select name="CUSTYPE"
						<?php
							$CUSTYPE = $row['CUSTYPE'];
							echo "$CUSTYPE";
						?>
						></option>
					  	<option value="A">乾性</option>
					  	<option value="B">中性</option>
					  	<option value="C">油性</option>
					  	<option value="D">混和性</option>
					</select></div>
				</label>
	        <label for="username">特殊要求
	        	<?php
	        		$SPEINS = $row['SPEINS'];
	        		echo "<textarea name=\"SPEINS\" cols=\"45\" rows=\"5\">$SPEINS</textarea>";
	        	?>
	        </label><br>
	        
	        <button type="submit">確定</button>
	        </form>
			<button type="button"></buttom><a href="../Homepage/index.php">取消</a>
		</div>
	</div>
	<?php
	}
	else{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=../HomePage/index.php>';
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