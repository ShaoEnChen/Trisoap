<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
    <title>建立訂單</title>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>   
    <link href='css/sign.css' rel='stylesheet' type='text/css'>
    <style>
    .sign-block input {
        width: 35%;
    }
    </style>
</head>

<body>
<br>
	<?php
	session_start();
    include_once("Helper/redirect.js");
	$EMAIL = $_SESSION['EMAIL'];
    $CUSIDT = $_SESSION['CUSIDT'];

	if($EMAIL != null && $CUSIDT == 'A'){
        ?>
        <div class="sign-block">
            <h1>建立訂單</h1>
            <form name="form" method="post" action="Create_ORDMAS1_finish.php">
                <label for="hidden"><input type="hidden" name="ORDTYPE" value="G" id="hidden"></input></label>
                <label for="num">田靜山巒禾風皂：<input type="text" name="ORDAMT_1" id="num"></input></label> 個<br>
                <label for="num">金絲森林渲染皂：<input type="text" name="ORDAMT_2" id="num"></input></label> 個<br>
                <label for="num">釋迦手感果力皂：<input type="text" name="ORDAMT_3" id="num"></input></label> 個<br>
                <label for="num">三三臺東意象禮盒組：<input type="text" name="ORDAMT_4" id="num"></input></label> 組<br>
                <label for="pricing">計價方式：
                    <select name="PRICETYPE" id="pricing">
                        <option value=""></option>
                        <option value="A">原價收費</option>
                        <option value="B">九折收費</option>
                        <option value="C">八折收費</option>
                        <option value="D">七折收費</option>
                        <option value="E">六折收費</option>
                        <option value="F">五折收費</option>
                    </select>
                </label>
                <label for="price">或 自訂價格：<input name="SETPRICE" id="price"></input></label><br>
                <label for="need"><textarea name="ORDINST" rows="3" placeholder="訂單特殊要求" id="need"></textarea></label>
                <label for="PW">請再次輸入您的密碼：<input name="PW" id="PW"></input></label><br>
                <button type="submit" class="promise">確定</button><br>
                <a href="../Homepage/index.php"><button type="button" class="cancel">取消</button></a>
            </form>
        </div>
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