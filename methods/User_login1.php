<!DOCTYPE html>
<html>

<head>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='css/sign.css' rel='stylesheet' type='text/css'>
    <meta charset="UTF-8">

    <title>三三社企-登入</title>
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
    <h1>Login</h1>
    <form name="form" method="post" action="User_login_finish.php">
        <label for="username"><input type="text" value="" placeholder="電子信箱" name="EMAIL" id="username" /></label>
        <label for="password"><input type="password" value="" placeholder="密碼" name="CUSPW" id="password" /></label>
        <button type="submit" class="promise">登入</button>
    </form>
    <button type="button" class="cancel"></buttom><a href="../Homepage/index.php">取消</a>
</div>
</body>
</html>