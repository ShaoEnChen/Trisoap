<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
    <title>登入</title>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='css/sign.css' rel='stylesheet' type='text/css'>
    <link href='css/single.css' rel='stylesheet' type='text/css'>
</head>

<body>
<br>
<div class="sign-block" style="width: 350px;">
    <h1>Login</h1>
    <form method="post" action="User_login_finish.php">
        <input type="text" placeholder="電子信箱" name="EMAIL" />
        <input type="password" placeholder="密碼" name="CUSPW" />
        <button type="submit" class="promise">登入</button>
    </form>
    <a href="Create_CUSMAS.php"><button type="button" class="cancel">立即註冊</button></a>
    <a href="/"><button type="button" class="cancel" style="width: 49.35%;">取消</button></a>
    <a href="User_ForgetPW.php"><button type="button" class="cancel" style="width: 49.35%;">忘記密碼</button></a>
</div>
</body>
</html>