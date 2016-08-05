<title>三三吾鄉手工皂 已完成訂單</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
session_start();
include("Helper/mysql_connect.php");
include("Helper/sql_operation.php");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];

if($EMAIL != null && $CUSIDT == 'A'){
    $ORDNO = $_POST['ORDNO'];
    echo "<form name=\"form\" method=\"post\" action=\"Update_ORDMAS_C_finish.php\">";
    echo "<input type=\"hidden\" name=\"ORDNO\" value=\"$ORDNO\" />";
    $row = select('ORDMAS', 'ORDNO', $ORDNO);
    echo "訂單編號：".$row['ORDNO']."<br>";
    echo "訂單種類：".$row['ORDTYPE']."<br>";
    echo "顧客編號：".$row['CUSNO']."<br>";
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

    echo "訂單狀態：<select name=\"ORDSTAT\" >";
    echo "<option value=\"C\">已完成</option>";
    echo "<option value=\"D\">刪除</option>";
    echo "</select> <br>";
    echo "<input type=\"submit\" name=\"button\" value=\"儲存\" />";
    echo "</form>";
?>
<a href="Update_ORDMAS_C.php">返回</a> <br>
<?php
}
else{
    ?>
    <script>
    alert("您無權限觀看此頁面!");
    </script>
    <meta http-equiv=REFRESH CONTENT=0.5;url=../Homepage/index.php>
    <?
}