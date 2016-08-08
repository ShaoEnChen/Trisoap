<!DOCTYPE html>
<html>

<head>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='css/sign.css' rel='stylesheet' type='text/css'>
    <link href='css/table.css' rel='stylesheet' type='text/css'>
    <meta charset="UTF-8">

    <title>建立訂單</title>
    <style>
    .sign-block {
        width: 400px;
        padding: 20px;
        border-top: 10px solid #AA0000;
        position: absolute;
        top: 50%;
        left: 50%;
        margin-right: -50%;
        transform: translate(-50%, -50%);
    }
    .sign-block h1 {
        font-family: 微軟正黑體;
    }
    .promise {
        background: #AA0000;
        border: 1px solid #880000;
    }
    .promise:hover {
        background: #880000;
    }
    </style>
</head>

<body>
    <?php
    session_start();
    include("Helper/mysql_connect.php");
    include("Helper/sql_operation.php");
    $EMAIL = $_SESSION['EMAIL'];
    $ORDNO = $_SESSION['ORDNO'];

    if($EMAIL != null){
    ?>
    <br>
    <div class="sign-block">
        <form method="post" action="cashing_test.php">
        <h1>請先建立訂單</h1>
            <label for="PAYTYPE">
                <div class="q-select">
                    <select name="PAYTYPE" id="PAYTYPE" required>
                        <option value="">選擇付款方式</option>
                        <option value="Credit">信用卡</option>
                        <option value="ATM">ATM</option>
                        <option value="WebATM">網路ATM</option>
                    </select>
                </div>
            </label>
        <br>
        <button type="submit" class="promise" value="確定結帳"></buttom><!--<a href="cashing_test.php">確定結帳</a>-->
        </form>
        <br>
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


<form method="post" action="Create_ORDMAS2.php">
    <label for="PAYTYPE">
        <div class="q-select">
            <select name="PAYTYPE" id="PAYTYPE" required>
                <option value="">選擇付款方式*</option>
                <option value="Credit">信用卡</option>
                <option value="ATM">ATM</option>
                <option value="WebATM">網路ATM</option>
            </select>
        </div>
    </label>
    <br>
</form>