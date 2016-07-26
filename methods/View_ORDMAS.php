<title>三三吾鄉手工皂 查看訂單</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
session_start();
include("Helper/mysql_connect.php");
include("Helper/sql_operation.php");
$EMAIL = $_SESSION['EMAIL'];
$ORDNO = $_POST['ORDNO'];
if($EMAIL != null){
        $row = select('ORDMAS', 'ORDNO', $ORDNO);
        echo "訂單編號：".$row['ORDNO']."<br>";
        echo "訂單種類：".$row['ORDTYPE']."<br>";
        echo "訂單狀態：".$row['ORDSTAT']."<br>";
        echo "額外指令：".$row['ORDINST']."<br>";
        echo "購買商品：<br>";
        $queryORDITEM = "SELECT * FROM ORDITEMMAS where ORDNO='$ORDNO'";
        $queryDetail = mysql_query($queryORDITEM);
        while($item = mysql_fetch_array($queryDetail)){
                $ITEMNO = $item['ITEMNO'];
                $ITEMAMT = $item['ORDAMT'];
                $name = select('ITEMMAS', 'ITEMNO', $ITEMNO);
                echo "商品編號：".$ITEMNO." 商品名稱：".$name['ITEMNM']." 商品價格：".$name['PRICE']." 訂購數量：".$ITEMAMT." 總價：".$name['PRICE']*$ITEMAMT."<br>";
        }
        echo "訂單總額：".$row['TOTALPRICE']."<br>";
        echo "運輸費用：".$row['SHIPFEE']."<br>";
        echo "訂單總值：".$row['TOTALAMOUNT']."<br>";
        echo "付款狀態：".$row['PAYSTAT']."<br>";
?>
<a href="../Homepage.php">返回</a>
<?php
}
else{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=../Homepage/index.php>';
}
?>