<title>三三吾鄉手工皂 查看訂單</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
session_start();
include("Helper/mysql_connect.php");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];

if($EMAIL != null){
    echo "我的所有訂單：<br>";
    $queryORDMAS = "SELECT * FROM ORDMAS WHERE EMAIL = '$EMAIL' AND ACTCODE=1";
    $result = mysql_query($queryORDMAS);
    while($row = mysql_fetch_array($result)){
        $ORDNO = $row['ORDNO'];
        echo "訂單編號:";
        echo "<form name=\"form\" method=\"post\" action=\"View_ORDITEM.php\">";
        echo "<input type=\"hidden\" name=\"ORDNO\" value=\"$ORDNO\" />";
        echo "<input type=\"hidden\" name=\"RETURN\" value=\"view\" />";
        echo "<input type=\"submit\" name=\"button\" value=\"$ORDNO\" />";
        echo "</form>";
        echo "訂單種類:".$row['ORDTYPE']." 顧客編號:".$row['EMAIL']." 發票編號:".$row['INVOICENO']." 缺貨狀態:".$row['BACKSTAT']." 訂單狀態:".$row['ORDSTAT']." 付款狀態:".$row['PAYSTAT']." 額外指令:".$row['ORD_INST']." 訂單總額:".$row['TOTALPRICE']." 訂單總值:".$row['TOTALAMT']." 建立日期:".$row['CREATEDATE']."</br>";
    }
    echo "<br>";
}
else{
    echo '請先註冊或登入';
    echo '<meta http-equiv=REFRESH CONTENT=1;url=../Homepage/index.php>';
}