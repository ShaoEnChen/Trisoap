<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
    <title>三三社企-登入</title>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='css/sign.css' rel='stylesheet' type='text/css'>
    <link href='css/single.css' rel='stylesheet' type='text/css'>
</head>

<body>
<br>
<div class="sign-block" style="width: 350px;">
    <h1>Login</h1>
    <form name="form" method="post" action="User_login_finish.php">
        <label for="username"><input type="text" value="" placeholder="電子信箱" name="EMAIL" id="username" /></label>
        <label for="password"><input type="password" value="" placeholder="密碼" name="CUSPW" id="password" /></label>
        <button type="submit" class="promise">登入</button>
    </form>
    <a href="../Homepage/index.php"><button type="button" class="cancel">取消</button></a>
    <a href="User_ForgetPW.php"><button type="button" class="cancel">忘記密碼</button></a>
</div>
</body>
</html>