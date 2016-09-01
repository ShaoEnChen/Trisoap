<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
    <title>三三社企-商品出貨</title>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='css/sign.css' rel='stylesheet' type='text/css'>
    <link href='css/single.css' rel='stylesheet' type='text/css'>
</head>

<body>
<?
session_start();
include_once("Helper/mysql_connect.php");
include_once("Helper/redirect.js");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];

if($EMAIL != null && $CUSIDT == 'A'){
    ?>
    <br>
    <div class="sign-block" style="width: 350px;">
        <h1>請輸入發票編號</h1>
        <form name="form" method="post" action="Update_ORDMAS_end.php">
            <label for="id"><input type="text" placeholder="發票編號" name="INVOICENO" id="id"/></label>
            <button type="submit" class="promise">確定</button>
        </form>
    </div>
    <?
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
</body>
</html>