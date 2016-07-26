<!DOCTYPE html>
<html>

<head>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <meta charset="UTF-8">

    <title>三三社企-註冊</title>
    <style>
    body {
        background: url('http://i.imgur.com/Eor57Ae.jpg') no-repeat fixed center center;
        background-size: cover;
        font-family: Montserrat;
    }

    .logo {
        width: 213px;
        height: 36px;
        background: url('http://i.imgur.com/fd8Lcso.png') no-repeat;
        margin: 30px auto;
    }

    .login-block {
        width: 640px;
        padding: 20px;
        background: #fff;
        border-radius: 5px;
        border-top: 5px solid #FFA042;
        margin: 0 auto;
    }

    .login-block h1 {
        text-align: center;
        color: #000;
        font-size: 18px;
        text-transform: uppercase;
        margin-top: 0;
        margin-bottom: 20px;
    }

    .login-block input {
        width: 49.5%;
        height: 42px;
        box-sizing: border-box;
        border-radius: 5px;
        border: 1px solid #ccc;
        margin-bottom: 20px;
        font-size: 14px;
        font-family: Montserrat;
        padding: 0 20px 0 50px;
        outline: none;
    }

    .login-block input#username {
        background: #fff 20px top no-repeat;
        background-size: 16px 80px;
    }

    .login-block input#username:focus {
        background: #fff 20px bottom no-repeat;
        background-size: 16px 80px;
    }

    .login-block input#password {
        background: #fff 20px top no-repeat;
        background-size: 16px 80px;
    }

    .login-block input#password:focus {
        background: #fff 20px bottom no-repeat;
        background-size: 16px 80px;
    }

    .login-block input:active, .login-block input:focus {
        border: 1px solid #ff656c;
    }

    .login-block button {
        width: 100%;
        height: 40px;
        background: #FFA042;
        box-sizing: border-box;
        border-radius: 5px;
        border: 1px solid #FF9224;
        color: #fff;
        font-weight: bold;
        text-transform: uppercase;
        font-size: 14px;
        font-family: 微軟正黑體;
        outline: none;
        cursor: pointer;
    }

    .login-block button:hover {
        background: #FF9224;
    }

    .login-block textarea {
        width: 100%;
        height: 55px;
        box-sizing: border-box;
        border-radius: 5px;
        border: 1px solid #ccc;
        margin-bottom: 20px;
        font-size: 14px;
        font-family: Montserrat;
        padding: 0 20px 0 50px;
        outline: none;
    }

    .q-select select {
        width: 49.5%;
        height: 42px;
        box-sizing: border-box;
        border-radius: 5px;
        border: 1px solid #ccc;
        margin-bottom: 20px;
        font-size: 14px;
        font-family: Montserrat;
        padding: 0 20px 0 50px;
        outline: none;
    }

    .b-select select {
        width: 25%;
        height: 42px;
        box-sizing: border-box;
        border-radius: 5px;
        border: 1px solid #ccc;
        margin-bottom: 20px;
        font-size: 14px;
        font-family: Montserrat;
        padding: 0 20px 0 50px;
        outline: none;
    }

    </style>
</head>

<body>

<div class="logo"></div>
<div class="login-block">
    <h1>Register</h1>
    <form name="form" method="post" action="Create_CUSMAS_finish.php">
        <?
        session_start();
        $CUSNM = $_SESSION['CUSNM'];
        $CUSADD = $_SESSION['CUSADD'];
        $CUSTYPE = $_SESSION['CUSTYPE'];
        $CUSBIRTHY = $_SESSION['CUSBIRTHY'];
        $CUSBIRTHM = $_SESSION['CUSBIRTHM'];
        $CUSBIRTHD = $_SESSION['CUSBIRTHD'];
        $TEL = $_SESSION['TEL'];
        $EMAIL = $_SESSION['EMAIL'];
        $TAXID = $_SESSION['TAXID'];
        $KNOWTYPE = $_SESSION['KNOWTYPE'];
        $SPEINS = $_SESSION['SPEINS'];
        ?>
        <label for="username"><input type="text" name="EMAIL" value="<?echo $EMAIL;?>" placeholder="電子信箱*" id="username"/></label>
        <label for="name"><input type="text" name="CUSNM" value="<?echo $CUSNM;?>" placeholder="您的姓名*" id="name"/></label>
        <label for="password"><input type="password" name="CUSPW1" placeholder="設定密碼*" id="password"/></label>
        <label for="password"><input type="password" name="CUSPW2" placeholder="再次輸入密碼*" id="password2"/></label>
        <label for="bookdate"><input type="date" name="CUSBIRTH" placeholder="生日  ex.1999-12-31" id="bookdate"/></label>
        <label for="username"><input type="text" name="TEL" value="<?php echo $TEL;?>" placeholder="聯絡電話"/></label>
        <label for="username"><input type="text" name="CUSADD" value="<?php echo $CUSADD;?>" placeholder="通訊地址"/></label> 
        <label for="username"><input type="text" name="TAXID" value="<?php echo $TAXID;?>" placeholder="統一編號"/></label>
        <label for="username">
            <div class="q-select">
                <select name="CUSTYPE">
                    <option value="">您的膚質*</option>
                    <option value="A">乾性</option>
                    <option value="B">中性</option>
                    <option value="C">油性</option>
                    <option value="D">混和性</option>
                </select>  
                <select name="KNOWTYPE">
                    <option value="">如何認識三三*</option>
                    <option value="A">粉絲專頁</option>
                    <option value="B">親友介紹</option>
                    <option value="C">媒體宣傳</option>
                    <option value="D">實體攤位</option>
                    <option value="E">其它</option>
                </select>
            </div>
        </label>
        <label for="username"><textarea name="SPEINS" value="<?php echo $SPEINS;?>" placeholder="特殊要求""></textarea></label>
        <button type="submit">註冊</button>
    </form><br>
    <button type="button"></buttom><a href="../Homepage/index.php">取消</a>
</div>
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