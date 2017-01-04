<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
    <title>新增商品</title>
    <meta name="author" content="2016 NTUIM SA GROUP7">
    <meta name="description" content="">
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <!-- custom css -->
    <link href="css/sign.css" rel="stylesheet">
    <link href="css/single.css" rel="stylesheet">
</head>

<body>
<br>
<div class="sign-block" style="width: 350px;">
<h1>新增商品</h1>
<?php
session_start();
include_once("Helper/mysql_connect.php");
include_once("Helper/analyticstracking.php");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];

if($EMAIL != null && $CUSIDT == 'A'){
	?>
    <form method="post" action="Create_ITEMMAS_finish.php">
    商品編號：<input type="text" name="ITEMNO" />
	商品名稱：<input type="text" name="ITEMNM" />
	商品數量：<input type="text" name="ITEMAMT" />
	商品價格：<input type="text" name="PRICE" />
	商品描述：<input type="text" name="DESCRIPTION" />
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