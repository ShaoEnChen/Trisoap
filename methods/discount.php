<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
    <title>三三社企-使用折價卷</title>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='css/sign.css' rel='stylesheet' type='text/css'>
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
    <h1>使用折價卷</h1>
    <form name="form" method="post" action="discount_finish.php">
        <label for="number">請輸入兌換碼：<input type="text" name="DISCOUNT" id="number" /></label>
        <button type="submit" class="promise">確定</button>
    </form>
    <button type="button" class="cancel"></buttom><a href="Order_Confirm.php">取消</a>
</div>
</body>
</html>