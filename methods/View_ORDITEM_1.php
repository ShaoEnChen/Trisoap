<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
    <title>三三社企-缺貨中訂單</title>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='css/normal.css' rel='stylesheet' type='text/css'>
    <style>
    .sign-block {
        width: 650px;
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
<h1>缺貨中訂單</h1>
<?php
session_start();
include("Helper/mysql_connect.php");
include("Helper/sql_operation.php");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];

if($EMAIL != null && $CUSIDT == 'A'){
    $ORDNO = $_POST['ORDNO'];
    $row = select('ORDMAS', 'ORDNO', $ORDNO);
    echo "<form name=\"form\" method=\"post\" action=\"Update_ORDMAS_1_finish.php\">";
    echo "<input type=\"hidden\" name=\"ORDNO\" value=\"$ORDNO\" />";
    echo "訂單編號：".$row['ORDNO']."<br>";
    echo "訂單種類：".$row['ORDTYPE']."<br>";
    echo "顧客信箱：".$row['EMAIL']."<br>";
    echo "額外指令：".$row['ORDINST']."<br>";
    echo "訂購商品：<br>";
    
    $queryDetail = "SELECT * FROM ORDITEMMAS WHERE ORDNO='$ORDNO'";
    $Detail = mysql_query($queryDetail);
    while($item = mysql_fetch_array($Detail)){
        $ITEMNO = $item['ITEMNO'];
        $ITEMAMT = $item['ORDAMT'];
        $name = select('ITEMMAS', 'ITEMNO', $ITEMNO);
        echo "商品編號：".$ITEMNO." 商品名稱：".$name['ITEMNM']." 商品價格：".$name['PRICE']." 訂購數量：".$ITEMAMT." 總價：".$name['PRICE']*$ITEMAMT."<br>";
    }

    echo "訂單總額：".$row['TOTALPRICE']."<br>";
    echo "運輸費用：".$row['SHIPFEE']."<br>";
    echo "訂單總值：".$row['TOTALAMT']."<br>";
    echo "建立日期：".$row['CREATEDATE']."</br>";
    ?>
    <label for="ORDSTAT">訂單狀態：<select name="ORDSTAT">
    <option value="R">缺貨中</option>
    <option value="C">已完成</option>
    <option value="F">強制結束</option>
    </select></label><br><br><br>
    <button type="submit" class="promise">儲存</button>
    </form>
    <button type="button" class="cancel"></buttom><a href="Update_ORDMAS_1.php">取消</a>
    <?
}
else{
    ?>
    <script>
    alert("您無權限觀看此頁面!");
    </script>
    <meta http-equiv=REFRESH CONTENT=0.5;url=../Homepage/index.php>
    <?
}
?>
</div>
</body>
</html>