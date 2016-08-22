<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
    <title>三三社企-更新商品</title>
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
<h1>更新商品</h1>
<?php
session_start();
include_once("Helper/mysql_connect.php");
include_once("Helper/sql_operation.php");
include_once("Helper/redirect.js");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];
$newITEMNO = $_POST['ITEMNO'];
$message = null;

if($EMAIL != null && $CUSIDT == 'A'){
        if($newITEMNO == null){
                $message = $message . '商品編號欄位不可空白<br>';
        }
        $row = select('ITEMMAS', 'ITEMNO', $newITEMNO);
        if($row['ITEMNO'] == null){
                $message = $message . '查無此商品編號之商品<br>';
        }
        if($message == null){
                $_SESSION['newITEMNO'] = $newITEMNO;
                ?>
                <form name="form" method="post" action="Edit_ITEMMAS_end.php">
                <label for="ITEMNO">商品編號：<?echo $newITEMNO;?></label><br><br>
                <label for="ITEMNM">商品名稱：<input type="text" name="ITEMNM" value="<?echo $row['ITEMNM'];?>" /></label>
                <label for="ITEMAMT">商品數量：<input type="text" name="ITEMAMT" value="<?echo $row['ITEMAMT'];?>" /></label>
                <label for="PRICE">商品價格：<input type="text" name="PRICE" value="<?echo $row['PRICE'];?>" /></label>
                <label for="DESCRIPTION">商品敘述：<input type="text" name="DESCRIPTION" value="<?echo $row['DESCRIPTION'];?>" /></label>
                <label for="PW">請再次輸入您的密碼：<input type="password" name="PW" /></label>
                <button type="submit" class="promise">確定</button>
                </form>
                <button type="button" class="cancel"></buttom><a href="Update_ITEMMAS.php">取消</a>
                <?
        }
        else{
                ?>
                <script>
                redirect("Edit_ITEMMAS.php");
                alert("<?echo $message;?>");
                </script>
                <?
        }
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