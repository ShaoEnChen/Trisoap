<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
    <title>商品售出</title>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='css/sign.css' rel='stylesheet' type='text/css'>
    <link href='css/single.css' rel='stylesheet' type='text/css'>
</head>

<body>
<br>
<div class="sign-block" style="width: 350px;">
<h1>商品售出</h1>
<?php
session_start();
include_once("Helper/redirect.js");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];

if($EMAIL != null && $CUSIDT == 'A'){
	?>
    <form method="post" action="Sold_ITEMMAS_finish.php">
    田靜山巒禾風皂：<input type="text" name="AMT1" placeholder="售出數量" />
    金絲森林渲染皂：<input type="text" name="AMT2" placeholder="售出數量" />
    釋迦手感果力皂：<input type="text" name="AMT3" placeholder="售出數量" />
    三三臺東意象禮盒組：<input type="text" name="AMT4" placeholder="售出數量" />
    銷售總額：<input type="text" name="real" />
    發票號碼：<input type="text" name="invoice" />
    請再次輸入您的密碼：<input type="password" name="PW" />
    <button type="submit" class="promise">確定</button>
    </form>
    <a href="Update_ITEMMAS.php"><button type="button" class="cancel">取消</button></a>
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
</div>
</body>
</html>