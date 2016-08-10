<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
    <title>三三社企-新增商品</title>
    <meta name="author" content="2016 NTUIM SA GROUP7">
    <meta name="description" content="">
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <!-- custim css -->
    <link href="css/normal.css" rel="stylesheet">
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
<h1>新增商品</h1>
<?php
session_start();
include("Helper/mysql_connect.php");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];

if($EMAIL != null && $CUSIDT == 'A'){
	?>
    <form name="form" method="post" action="Create_ITEMMAS_finish.php">
    <label for="ITEMNO">商品編號：<input type="text" name="ITEMNO" /> </label>
	<label for="ITEMNM">商品名稱：<input type="text" name="ITEMNM" /> </label>
	<label for="ITEMAMT">商品數量：<input type="text" name="ITEMAMT" /> </label>
	<label for="PRICE">商品價格：<input type="text" name="PRICE" /> </label>
	<label for="DESCRIPTION">商品描述：<input type="text" name="DESCRIPTION" /> </label>
    <label for="PW">請再次輸入您的密碼：<input type="password" name="PW" /></label>
    <button type="submit" class="promise">確定</button>
    </form>
    <button type="button" class="cancel"></buttom><a href="Update_ITEMMAS.php">取消</a>
    <?
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
</div>
</body>
</html>