<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
    <title>更新商品</title>
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
include_once("Helper/analyticstracking.php");
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
                <form method="post" action="Edit_ITEMMAS_end.php">
                商品編號：<?php echo $newITEMNO;?><br><br>
                商品名稱：<input type="text" name="ITEMNM" value="<?php echo $row['ITEMNM'];?>" />
                商品價格：<input type="text" name="PRICE" value="<?php echo $row['PRICE'];?>" />
                商品敘述：<input type="text" name="DESCRIPTION" value="<?php echo $row['DESCRIPTION'];?>" />
                請再次輸入您的密碼：<input type="password" name="PW" />
                <button type="submit" class="promise">確定</button>
                </form>
                <a href="Update_ITEMMAS.php"><button type="button" class="cancel">取消</button></a>
                <?php 
        }
        else{
                ?>
                <script>
                redirect("Edit_ITEMMAS.php");
                alert("<?php echo $message;?>");
                </script>
                <?php 
        }
}
else{
        ?>
        <script>
        redirect("/");
        alert("您無權限觀看此頁面!");
        </script>
        <?php 
}
?>
</div>
</body>
</html>