<!DOCTYPE html>
<html>

<head>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <meta charset="UTF-8">

    <title>三三社企-登入</title>
    <style>
    body {
        background: url('http://i.imgur.com/Eor57Ae.jpg') no-repeat fixed center center;
        background-size: cover;
        font-family: Montserrat;
    }

    /*.logo {
        width: 213px;
        height: 36px;
        background: url('http://i.imgur.com/fd8Lcso.png') no-repeat;
        margin: 30px auto;
    }*/

    .login-block {
        width: 350px;
        padding: 20px;
        background: #fff;
        border-radius: 5px;
        border-top: 5px solid #FFA042;
        margin: 0 auto;
        position: absolute;
        top: 50%;
        left: 50%;
        margin-right: -50%;
        transform: translate(-50%, -50%)
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
        width: 100%;
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
        background: #fff url('http://i.imgur.com/u0XmBmv.png') 20px top no-repeat;
        background-size: 16px 80px;
    }

    .login-block input#username:focus {
        background: #fff url('http://i.imgur.com/u0XmBmv.png') 20px bottom no-repeat;
        background-size: 16px 80px;
    }

    .login-block input#password {
        background: #fff url('http://i.imgur.com/Qf83FTt.png') 20px top no-repeat;
        background-size: 16px 80px;
    }

    .login-block input#password:focus {
        background: #fff url('http://i.imgur.com/Qf83FTt.png') 20px bottom no-repeat;
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
        margin-bottom: 5px;
    }

    .login-block button:hover {
        background: #FF9224;
    }

    #cancel {
        width: 100%;
        height: 40px;
        background: #AAAAAA;
        box-sizing: border-box;
        border-radius: 5px;
        border: 1px solid #AAAAAA;
        color: #fff;
        font-weight: bold;
        text-transform: uppercase;
        font-size: 14px;
        font-family: 微軟正黑體;
        outline: none;
        cursor: pointer;
    }

    #cancel:hover {
        background: #888888;
    }

    a {
        color: white;
        text-decoration: none;
    }

    </style>
</head>

<body>
<br>
<!-- <div class="logo"></div> -->
<div class="login-block">
    <h1>Login</h1>
    <form name="form" method="post" action="User_login_finish.php">
        <label for="username"><input type="text" value="" placeholder="電子信箱" name="EMAIL" id="username" /></label>
        <label for="password"><input type="password" value="" placeholder="密碼" name="CUSPW" id="password" /></label>
        <button type="submit">登入</button>
    </form>
    <button type="button" id="cancel"></buttom><a href="../Homepage/index.php">取消</a>
</div>
</body>
<script>
    // $(document).ready(function () {
    //     $('#logo').addClass('animated fadeInDown');
    //     $("input:text:visible:first").focus();
    // });
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