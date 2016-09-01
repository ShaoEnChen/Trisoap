<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
    <title>三三社企-更新商品</title>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='css/sign.css' rel='stylesheet' type='text/css'>
    <link href='css/single.css' rel='stylesheet' type='text/css'>
</head>

<body>
<br>
<div class="sign-block" style="width: 350px;">
<h1>更新商品</h1>
<?php
session_start();
include_once("Helper/mysql_connect.php");
include_once("Helper/sql_operation.php");
include_once("Helper/handle_string.php");
include_once("Helper/redirect.js");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];
$newITEMNO = input('ITEMNO');
$message = null;

if($EMAIL != null && $CUSIDT == 'A'){
        if($newITEMNO == null){
                $message = $message . '商品編號欄位不可空白<br>';
        }
        $row = select('ITEMMAS', 'ITEMNO', $newITEMNO);
        if($message == null){
                $_SESSION['newITEMNO'] = $newITEMNO;
                ?>
                <form name="form" method="post" action="Edit_ITEMMAS_end.php">
                <label for="ITEMNO">商品編號：<?echo $newITEMNO;?></label><br><br>
                <label for="ITEMNM">商品名稱：<input type="text" name="ITEMNM" value="<?echo $row['ITEMNM'];?>" /></label>
                <label for="PRICE">商品價格：<input type="text" name="PRICE" value="<?echo $row['PRICE'];?>" /></label>
                <label for="DESCRIPTION">商品敘述：<input type="text" name="DESCRIPTION" value="<?echo $row['DESCRIPTION'];?>" /></label>
                <label for="PW">請再次輸入您的密碼：<input type="password" name="PW" /></label>
                <button type="submit" class="promise">確定</button>
                </form>
                <a href="Update_ITEMMAS.php"><button type="button" class="cancel">取消</button></a>
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