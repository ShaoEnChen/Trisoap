<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
    <title>上市商品</title>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='css/sign.css' rel='stylesheet' type='text/css'>
    <link href='css/single.css' rel='stylesheet' type='text/css'>
</head>

<body>
<br>
<div class="sign-block" style="width: 350px;">
<h1>上市商品</h1>
<?php
session_start();
include_once("Helper/mysql_connect.php");
include_once("Helper/redirect.js");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];

if($EMAIL != null && $CUSIDT == 'A'){
	?>
    <form method="post" action="Upload_ITEMMAS_finish.php">
    <div class="q-select">商品編號：
        <select name="ITEMNO">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>
    </div>
    請再次輸入您的密碼：<input type="password" name="PW" />
    <button type="submit" class="promise">確定</button>
    </form>
    <a href="Update_ITEMMAS.php"><button type="button" class="cancel">取消</button></a>
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
</div>
</body>
</html>