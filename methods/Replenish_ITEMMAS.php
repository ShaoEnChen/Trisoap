<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
    <title>三三社企-商品進貨</title>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='css/normal.css' rel='stylesheet' type='text/css'>
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
<h1>商品進貨</h1>
<?php
session_start();
include_once("Helper/mysql_connect.php");
include_once("Helper/redirect.js");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];

if($EMAIL != null && $CUSIDT == 'A'){
	?>
    <form name="form" method="post" action="Replenish_ITEMMAS_finish.php">
    <label for="ITEMNO">
        <div class="q-select">商品編號：
            <select name="ITEMNO" id="ITEMNO">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
        </div>
    </label>
    <label for="amt">進貨數量：<input type="text" name="AMT" id="amt"/></label>
    <label for="PW">請再次輸入您的密碼：<input type="password" name="PW" id="PW"/></label>
    <button type="submit" class="promise">確定</button>
    </form>
    <button type="button" class="cancel"></buttom><a href="Update_ITEMMAS.php">取消</a>
    <?
}
else{
	?>
	<script>
    redirect("../Homepage/index.php");
	alert("您無權限觀看此頁面!");
	</script>
	<?
}
?>
</div>
</body>
</html>